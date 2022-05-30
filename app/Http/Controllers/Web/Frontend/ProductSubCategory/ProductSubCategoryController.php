<?php

namespace App\Http\Controllers\Web\Frontend\ProductSubCategory;

use App\Http\Controllers\Controller;
use App\Models\ProductSubCategory;
use Illuminate\Http\Request;

class ProductSubCategoryController extends Controller
{
    public function index($slug)
    {
        $productSubCategory = ProductSubCategory::where(['slug' => $slug, 'is_active' => true])->with('product.seller')->first();
        $data = [
            'title' => $productSubCategory != null ? $productSubCategory->name : 'Kategori Tidak Ditemukan',
            'productSubCategory' => $productSubCategory,
            'products' => $productSubCategory != null ? $productSubCategory->product : null,
        ];

        return view('frontend.sub_category.index', $data);
    }
}
