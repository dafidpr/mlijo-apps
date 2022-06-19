<?php

namespace App\Http\Controllers\Web\Backend\Seller\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'mods' => 'seller/dashboard',
            'isContainer' => true,
            'countCard' => $this->getCountCard(),
            'income' => $this->getIncome(),
        ];
        return customView('seller.dashboard.index', $data, 'backend');
    }

    public function getSaleChart()
    {
        $month = [
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
        ];
        $sales = Order::with('orderDetail')->where(['seller_id' => auth()->user()->userable->id, 'payment_status' => 'paid', 'status_order' => 'done'])->whereYear('created_at', date('Y'))->get();
        $incomeOfYear = [];
        foreach ($month as $key => $value) {
            $incomeOfYear[$key] = [
                'month' => $value,
                'income' => 0
            ];
            $totalIncome = 0;
            foreach ($sales as $item) {
                $month = Carbon::parse($item->created_at)->format('m');
                if (($month - 1) == $key) {
                    $totalIncome += $item->orderDetail->sum('total');
                    $incomeOfYear[$key] = [
                        'month' => $value,
                        'income' => $totalIncome,
                    ];
                }
            }
        }
        return response()->json([
            'status' => 'success',
            'data' => $incomeOfYear,
        ]);
    }

    private function getCountCard()
    {
        $data = [
            'notPaid' => $this->getOrderByStatus(['payment_status' => 'pending'])->count(),
            'needProcess' => $this->getOrderByStatus(['payment_status' => 'paid', 'status_order' => 'pending'])->count(),
            'doneProcess' => $this->getOrderByStatus(['payment_status' => 'paid', 'status_order' => 'done'])->count(),
            'outOfStock' => Product::where(['seller_id' => auth()->user()->userable->id, 'stock' => 0])->count(),
        ];
        return $data;
    }

    private function getIncome()
    {
        $data = [
            'currentMonth' => $this->getIncomeByTime(date('m')),
            'lastMonth' => $this->getIncomeByTime(date('m') - 1),
        ];
        return $data;
    }

    private function getIncomeByTime($month)
    {
        $total = 0;
        $orders = Order::where(['seller_id' => auth()->user()->userable->id, 'payment_status' => 'paid', 'status_order' => 'done'])->with('orderDetail')
            ->whereMonth('created_at', $month)->get();
        foreach ($orders as $order) {
            $total += $order->orderDetail->sum('total');
        }
        return $total;
    }

    private function getOrderByStatus($where)
    {
        $orders = Order::where(['seller_id' => auth()->user()->userable->id])->where($where)->get();
        return $orders;
    }
}
