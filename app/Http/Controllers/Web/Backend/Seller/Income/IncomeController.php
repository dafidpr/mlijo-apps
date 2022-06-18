<?php

namespace App\Http\Controllers\Web\Backend\Seller\Income;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class IncomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Penghasilan Saya',
            'mods' => 'seller/income',
            'income' => $this->getIncome(),
        ];

        return customView('seller.income.index', $data, 'backend');
    }

    private function getIncome()
    {
        $data = [
            'notRelease' => $this->getOrderIncome('notRelease'),
            'releasedThisMonthTotal' => $this->getOrderIncome('releaseThisMonth'),
            'releasedThisWeekTotal' => $this->getOrderIncome('releaseThisWeek'),
            'releasedTotal' => $this->getOrderIncome('releaseTotal'),
        ];
        return $data;
    }

    public function getNotReleaseIncome(Request $request)
    {
        $query = $this->filterData(Order::where(['payment_status' => 'paid', 'seller_id' => auth()->user()->userable->id])->with('orderDetail.product', 'shipping', 'customer')
            ->whereNotIn('status_order', ['done', 'fail', 'canceled']), $request);
        return DataTables::of($query->get())->addColumn('order_date', function ($data) {
            return Carbon::parse($data->created_at)->isoFormat('dddd, D MMMM YYYY');
        })->addColumn('order_total', function ($data) {
            return $data->orderDetail->sum('total');
        })->make(true);
    }
    public function getReleaseIncome(Request $request)
    {
        $query = $this->filterData(Order::where(['payment_status' => 'paid', 'seller_id' => auth()->user()->userable->id])->with('orderDetail.product', 'shipping', 'customer')
            ->where('status_order', 'done'), $request);
        return DataTables::of($query->get())->addColumn('order_date', function ($data) {
            return Carbon::parse($data->created_at)->isoFormat('dddd, D MMMM YYYY');
        })->addColumn('order_total', function ($data) {
            return $data->orderDetail->sum('total');
        })->make(true);
    }

    private function getOrderIncome($type)
    {
        $orders = Order::where(['seller_id' => auth()->user()->userable->id])->with('orderDetail');
        $income = 0;
        if ($type == 'releaseTotal') {
            $orders->where(['status_order' => 'done', 'payment_status' => 'paid']);
        }
        if ($type == 'notRelease') {
            $orders->where(['payment_status' => 'paid']);
            $orders->whereNotIn('status_order', ['done', 'fail', 'canceled']);
        }
        if ($type == 'releaseThisMonth') {
            $orders->where(['payment_status' => 'paid', 'status_order' => 'done']);
            $orders->whereMonth('created_at', date('m'));
        }
        if ($type == 'releaseThisWeek') {
            $orders->where(['payment_status' => 'paid', 'status_order' => 'done']);
            $orders->whereBetween(
                'created_at',
                [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
            );
        }
        foreach ($orders->get() as $order) {
            foreach ($order->orderDetail as $orderDetail) {
                $income += $orderDetail->total;
            }
        }

        return $income;
    }

    private function filterData($query, Request $request)
    {

        if ($request->has('date') && $request->date != '') {
            $dateSplit = explode(' - ', $request->date);
            $startDate = Carbon::createFromFormat('d/m/Y', $dateSplit[0]);
            $endDate = Carbon::createFromFormat('d/m/Y', $dateSplit[1]);

            $query->whereDate('created_at', '>=', $startDate->format('Y-m-d'))->whereDate('created_at', '<=', $endDate->format('Y-m-d'));
        }

        return $query;
    }
}
