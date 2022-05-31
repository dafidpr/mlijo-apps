<?php

namespace App\Http\Controllers\Web\Frontend\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($slug)
    {
        $product = Product::where(['slug' => $slug, 'is_active' => true])->with(['productSubCategory', 'seller', 'productVariant.productVariantDetail', 'productImage'])->first();
        $data = [
            'title' => $product != null ? $product->name : 'produk Tidak Ditemukan',
            'product' => $product,
        ];

        return view('frontend.product.index', $data);
    }
}
