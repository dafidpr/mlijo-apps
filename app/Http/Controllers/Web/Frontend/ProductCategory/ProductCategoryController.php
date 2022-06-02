<?php

namespace App\Http\Controllers\Web\Frontend\ProductCategory;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index($slug)
    {
        $productCategory = ProductCategory::where(['slug' => $slug, 'is_active' => true])->with('productSubCategory.product.seller')->first();
        $data = [
            'title' => $productCategory != null ? $productCategory->name : 'Kategori Tidak Ditemukan',
            'productCategory' => $productCategory,
            'products' => $productCategory->productSubCategory != null ? $productCategory->productSubCategory->pluck('product') : null,
        ];

        return view('frontend.category.index', $data);
    }
}
