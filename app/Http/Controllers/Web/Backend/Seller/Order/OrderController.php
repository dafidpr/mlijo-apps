<?php

namespace App\Http\Controllers\Web\Backend\Seller\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderTracking;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Daftar Pesanan',
            'mods' => 'seller/order',
            'pendingOrder' => $this->countStatus('payment_status', 'pending'),
            'shippingOrder' => $this->countStatus('status_order', 'shipping'),
            'shippingOrder' => $this->countStatus('status_order', 'shipping'),
            'failOrder' => $this->countStatus('status_order', 'fail'),
            'doneOrder' => $this->countStatus('status_order', 'done'),
        ];

        return customView('seller.order.index', $data, 'backend');
    }

    public function getData(Request $request)
    {
        $query = $this->filterData(Order::where(['seller_id' => auth()->user()->userable->id])->with(['customer', 'shipping', 'paymentMethod', 'orderDetail.product', 'orderAddress', 'orderTracking']), $request);

        return DataTables::of($query->get())->editColumn('created_at', function ($data) {
            return Carbon::parse($data->created_at)->isoFormat('D MMMM YYYY HH:mm');
        })->make(true);
    }

    public function show(Order $order)
    {
        try {
            return response()->json([
                'status' => 'success',
                'data' => $order,
            ]);
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function getDataProducts(Order $order)
    {
        $query = $order->orderDetail()->with('product');

        return DataTables::of($query->get())->addColumn('product_name', function ($data) {
            return $data->product->name;
        })->make(true);
    }

    public function showTracking(Order $order)
    {
        try {
            $data = [];
            foreach ($order->orderTracking()->orderBy('id', 'desc')->get() as $item) {
                switch ($item->status_order) {
                    case 'pending':
                        $status = 'Transaksi Dibuat';
                        break;
                    case 'processing':
                        $status = 'Pesanan Diproses';
                        break;
                    case 'shipping':
                        $status = 'Pesanan Sedang Dikirim';
                        break;
                    case 'delivered':
                        $status = 'Pesanan Diterima';
                        break;
                    case 'canceled':
                        $status = 'Pesanan Dicancel';
                        break;
                    case 'done':
                        $status = 'Pesanan Selesai';
                        break;
                    default:
                        $status = 'Pesanan Gagal';
                        break;
                }
                $data[] = [
                    'status' => $item->status_order,
                    'title' => $status,
                    'description' => $item->description,
                    'status_date' => Carbon::parse($item->created_at)->isoFormat('D MMMM YYYY HH:mm'),
                ];
            }
            return response()->json([
                'status' => 'success',
                'data' => $data,
            ]);
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function storeReceipt(Order $order, Request $request)
    {
        $request->validate([
            'receipt_number' => 'required',
        ]);
        try {
            $order->update([
                'receipt_number' => $request->receipt_number,
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil menyimpan nomor resi',
            ]);
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
    public function updateStatusOrder(Order $order, $status)
    {
        try {
            $order->update([
                'status_order' => $status,
            ]);
            OrderTracking::create([
                'order_id' => $order->id,
                'status_order' => $status,
                'description' => $status == 'canceled' ? 'Transaksi dicancel' : ($status == 'processing' ? 'Pesanan Diproses' : 'Pesanan Dikirim'),
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil ' . $status == 'canceled' ? 'cancel' : ($status == 'processing' ? 'proses' : 'kirim') . ' pesanan',
            ]);
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function invoice(Order $order)
    {
        $data = [
            'title' => $order->order_code,
            'mods' => 'seller/order',
            'order' => $order,
        ];

        return customView('seller.order.invoice', $data, 'backend');
    }

    private function countStatus($field, $status)
    {
        return Order::where(['seller_id' => auth()->user()->userable->id])->where($field, $status)->count();
    }

    private function filterData($query, Request $request)
    {
        if ($request->has('payment_status') && $request->payment_status != '') {
            if ($request->payment_status != 'all') {
                $query->where('payment_status', $request->payment_status);
            }
        }
        if ($request->has('order_status') && $request->order_status != '') {
            if ($request->order_status != 'all') {
                $query->where('status_order', $request->order_status);
            }
        }

        if ($request->has('date') && $request->date != '') {
            $dateSplit = explode(' - ', $request->date);
            $startDate = Carbon::createFromFormat('d/m/Y', $dateSplit[0]);
            $endDate = Carbon::createFromFormat('d/m/Y', $dateSplit[1]);

            $query->whereDate('created_at', '>=', $startDate->format('Y-m-d'))->whereDate('created_at', '<=', $endDate->format('Y-m-d'));
        }

        return $query;
    }
}
