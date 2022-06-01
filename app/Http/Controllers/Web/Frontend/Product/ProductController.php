<?php

namespace App\Http\Controllers\Web\Frontend\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($slug)
    {
        $product = $this->getProduct($slug);
        $data = [
            'title' => $product != null ? $product->name : 'Produk Tidak Ditemukan',
            'product' => $product,
            'productRelatedCategory' => $this->getNewProductRelatedCategory($product->productSubCategory->productCategory, null, null, 16),
            'newProducts' => $this->getNewProductRelatedCategory($product->productSubCategory->productCategory, 'created_at', 'desc', 3),

        ];
        return view('frontend.product.index', $data);
    }
    private function getProduct($slug)
    {
        $product = Product::where(['slug' => $slug, 'is_active' => true])->with(['productSubCategory', 'seller.sellerNote', 'productVariant.productVariantDetail', 'productImage'])->first();
        return $product;
    }

    private function getNewProductRelatedCategory($productCategory, $orderBy = null, $orderType = null, $limit = null)
    {
        $products = Product::whereHas('productSubCategory.productCategory', function ($q) use ($productCategory) {
            $q->where('id', $productCategory->id);
        });
        if ($orderBy != null && $orderType != null) {
            $products->orderBy($orderBy, $orderType);
        }
        if ($limit != null) {
            $products->take($limit);
        }
        return $products->get();
    }
}
