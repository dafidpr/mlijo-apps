<?php

namespace App\Http\Controllers\Web\Frontend\ProductCategory;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index($slug)
    {
        // return ProductCategory::all();
        $data = [
            'title' => 'Test'
        ];  
        return view ('frontend.categories.index', $data);
    }
}
