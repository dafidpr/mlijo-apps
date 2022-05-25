<?php

namespace App\Http\Controllers\Web\Backend\Root\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'mods' => 'root/dashboard',
        ];

        return customView('root.dashboard.index', $data, 'backend');
    }
}
