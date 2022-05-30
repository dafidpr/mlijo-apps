<?php

namespace App\Http\Controllers\Web\Frontend\Home;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Belanja Kebutuhan Sehari-hari Terlengkap se-Indonesia',
            'productSubCategories' => $this->getProductSubCategories(),
            'banners' => $this->getBanners()

        ];

        return view('frontend.home.index', $data);
    }

    private function getProductSubCategories()
    {
        return ProductSubCategory::whereHas('product', function ($q) {
            $q->where('is_active', true);
        })->with('product')->where('is_active', true)->get();
    }

    private function getBanners()
    {
        return Banner::where('is_active', true)->get();
    }
}
