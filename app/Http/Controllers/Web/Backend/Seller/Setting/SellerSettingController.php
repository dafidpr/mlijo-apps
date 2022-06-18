<?php

namespace App\Http\Controllers\Web\Backend\Seller\Setting;

use App\Http\Controllers\Controller;
use App\Models\SellerNote;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SellerSettingController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Pengaturan Toko',
            'mods' => 'seller/setting',
        ];

        return customView('seller.setting.index', $data, 'backend');
    }

    public function getNotes()
    {
        return DataTables::of(SellerNote::where('seller_id', auth()->user()->userable->id)->get())->rawColumns(['note'])->make(true);
    }
}
