<?php

namespace App\Http\Controllers\Web\Backend\Seller\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'mods' => 'seller/dashboard',
        ];

        return customView('seller.dashboard.index', $data, 'backend');
    }
}
