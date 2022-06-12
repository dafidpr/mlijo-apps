<?php

namespace App\Http\Controllers\Web\Backend\Seller\Storefront;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\SellerCategory;
use App\Models\SellerProductCategory;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;
use Yajra\DataTables\DataTables;

class StorefrontProductController extends Controller
{
    public function index(SellerCategory $sellerCategory)
    {
        $data = [
            'title' => 'Daftar Produk Etalase',
            'mods' => 'seller/storefront_product',
            'sellerCategory' => $sellerCategory,
        ];

        return customView('seller.storefront.product.index', $data, 'backend');
    }

    public function getData(SellerCategory $sellerCategory)
    {
        $query = SellerProductCategory::with('product')->where('seller_category_id', $sellerCategory->id);
        return DataTables::of($query->get())->addColumn('price', function ($data) {
            return 'Rp.' . number_format($data->product->price);
        })->make(true);
    }
    public function getDataProduct(SellerCategory $sellerCategory)
    {
        $data = [];
        $sellerProductCategories = SellerProductCategory::with('product')->where('seller_category_id', $sellerCategory->id)->get();
        foreach ($sellerProductCategories as $sellerProductCategory) {
            array_push($data, $sellerProductCategory->product_id);
        }
        $query = Product::where(['seller_id' => auth()->user()->userable->id])->whereNotIn('id', $data);
        return DataTables::of($query->get())->addColumn('price', function ($data) {
            return 'Rp.' . number_format($data->price);
        })->make(true);
    }

    public function store(SellerCategory $sellerCategory, Request $request)
    {
        try {
            foreach ($request->products as $product) {
                SellerProductCategory::create([
                    'seller_category_id' => $sellerCategory->id,
                    'product_id' => Hashids::decode($product)[0],
                ]);
            }
            return response()->json([
                'status' => 'success',
                'message' => 'Produk berhasil ditambahkan',
            ]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy(SellerCategory $sellerCategory, SellerProductCategory $sellerProductCategory)
    {
        try {
            $sellerProductCategory->delete();
            return response()->json(['status' => 'success', 'message' => 'Produk berhasil dihapus']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}
