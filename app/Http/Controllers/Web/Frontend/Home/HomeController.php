<?php

namespace App\Http\Controllers\Web\Frontend\Home;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductSubCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Belanja Kebutuhan Sehari-hari Terlengkap se-Indonesia',
            'productSubCategories' => $this->getProductSubCategories(),
            'popularProducts' => $this->getPopularProducts(10),
            'bestSellingProducts' => $this->getPopularProducts(3),
            'newProducts' => $this->getNewProducts(3),
        ];

        return view('frontend.home.index', $data);
    }

    private function getProductSubCategories()
    {
        return ProductSubCategory::whereHas('product', function ($q) {
            $q->where('is_active', true);
        })->with('product')->where('is_active', true)->get();
    }
    private function getNewProducts($limit = 0)
    {
        $data = Product::with('seller')->where('is_active', true)->orderBy('created_at', 'desc')->limit($limit)->get();
        return $data;
    }
    private function getPopularProducts($limit = 0)
    {
        $data = OrderDetail::select(
            'order_details.product_id',
            'products.name',
            'products.thumbnail',
            'product_sub_categories.name as sub_category_name',
            'sellers.store_name',
            'products.price',
            'products.slug',
            \DB::raw('SUM(quantity) as total_quantity')
        )
            ->join('products', 'products.id', '=', 'order_details.product_id')
            ->join('product_sub_categories', 'products.product_sub_category_id', '=', 'product_sub_categories.id')
            ->join('sellers', 'products.seller_id', '=', 'sellers.id')
            ->where('products.is_active', true)
            ->orderBy('total_quantity', 'desc')
            ->groupBy('order_details.product_id')
            ->limit($limit)
            ->get();
        return $data;
    }
}
