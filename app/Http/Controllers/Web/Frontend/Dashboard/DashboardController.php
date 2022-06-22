<?php

namespace App\Http\Controllers\Web\Frontend\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderTracking;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $data = [
            'title' => 'Akun',
            'customerAddress' => auth()->user()->userable->address[0],
            'orders' => Order::where(['customer_id' => auth()->user()->userable->id])->with('orderDetail')->with('shipping')->get()
        ];

        return view('frontend.dashboard.index', $data);
    }


    public function tracking(Request $request)
    {
        try {
            if ($request->id != "") {
                $order = Order::where(['order_code' => $request->id, 'customer_id' => auth()->user()->userable->id])->first();
                $orderTracking = OrderTracking::where(['order_id' => $order->id])->get();
                $data = [];
                foreach ($orderTracking as $item) {
                    $status = '';
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
                        'title' => $status,
                        'description' => $item->description,
                        'date' => Carbon::parse($item->created_at)->isoFormat('D MMMM YYYY HH:mm')
                    ];
                }
                return response()->json([
                    'status' => 'success',
                    'message' => 'Berhasil mendapatkan data',
                    'data' => $data
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Gagal mendapatkan data',
                ], 500);
            }
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}
