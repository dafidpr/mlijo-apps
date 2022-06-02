<?php

namespace App\Http\Controllers\Web\Frontend\ProductCategory;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index($slug)
    {
<<<<<<< HEAD
        $productCategory = ProductCategory::where(['slug' => $slug, 'is_active' => true])->with('productSubCategory.product')->first();
        //return dd($productCategory);
        $data = [
            'title' => $productCategory != null ? $productCategory->name : 'Kategori Tidak Ditemukan',
            'productCategory' => $productCategory,
            'products' => $productCategory->productSubCategory != null ? $productCategory->productSubCategory->product : null,
        ];

        return view('frontend.categories.index', $data);
=======
        $productCategory = ProductCategory::where(['slug' => $slug, 'is_active' => true])->with('productSubCategory.product.seller')->first();
        $data = [
            'title' => $productCategory != null ? $productCategory->name : 'Kategori Tidak Ditemukan',
            'productCategory' => $productCategory,
            'products' => $productCategory->productSubCategory != null ? $productCategory->productSubCategory->pluck('product') : null,
        ];

        return view('frontend.category.index', $data);
>>>>>>> 44269b54190de2d880d4217d5cb2477abab363dc
    }
}
