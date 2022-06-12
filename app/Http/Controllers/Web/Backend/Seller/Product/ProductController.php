<?php

namespace App\Http\Controllers\Web\Backend\Seller\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Daftar Produk',
            'mods' => 'seller/product',
        ];

        return customView('seller.product.index', $data, 'backend');
    }

    public function getData(Request $request)
    {
        $query = Product::with(['productSubCategory.productCategory', 'orderDetail', 'productVariant', 'discountProduct'])->where('seller_id', auth()->user()->userable->id);
        return DataTables::of($query->get())->addColumn('price', function ($data) {
            return 'Rp.' . number_format($data->price);
        })->addColumn('cart_count', function ($data) {
            return $data->cart->count();
        })->addColumn('wishlist_count', function ($data) {
            return $data->wishlist->count();
        })->addColumn('order_count', function ($data) {
            return $data->orderDetail->count();
        })->make(true);
    }
}
