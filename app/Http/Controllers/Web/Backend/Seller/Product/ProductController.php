<?php

namespace App\Http\Controllers\Web\Backend\Seller\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Backend\Product\ProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\ProductSubCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Vinkla\Hashids\Facades\Hashids;
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
        $query = Product::with(['productSubCategory.productCategory', 'productImage', 'orderDetail', 'productVariant', 'discountProduct'])->where('seller_id', auth()->user()->userable->id);
        return DataTables::of($query->get())->addColumn('price', function ($data) {
            return 'Rp.' . number_format($data->price);
        })->addColumn('cart_count', function ($data) {
            return $data->cart->count();
        })->addColumn('wishlist_count', function ($data) {
            return $data->wishlist->count();
        })->addColumn('order_count', function ($data) {
            return $data->orderDetail->count();
        })->addColumn('product_image_count', function ($data) {
            return $data->productImage->count();
        })->make(true);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Produk',
            'mods' => 'seller/product',
            'isContainer' => true,
            'action' => route('seller.products.store'),
            'productCategories' => ProductCategory::where('is_active', true)->get()
        ];

        return customView('seller.product.form', $data, 'backend');
    }

    public function getSubCategories(ProductCategory $productCategory)
    {
        try {
            $subCategories = $productCategory->productSubCategory()->where('is_active', true)->get();
            return response()->json(['status' => true, 'data' => $subCategories]);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function store(ProductRequest $request)
    {
        try {

            DB::beginTransaction();
            if ($request->hasFile('thumbnail')) {
                $file = $request->file('thumbnail');
                $thumbnail = Str::random(10) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('storage/images/products'), $thumbnail);
                $request->merge(['thumbnail' => $thumbnail]);
            }

            $product = Product::create([
                'seller_id' => auth()->user()->userable->id,
                'product_sub_category_id' => Hashids::decode($request->product_subcategory)[0],
                'name' => $request->name,
                'summary' => $request->summary,
                'description' => $request->description,
                'thumbnail'  => $thumbnail,
                'video' => $request->video,
                'min_order' => $request->min_order,
                'price' => stripCharacter($request->price),
                'stock' => $request->stock,
                'sku' => $request->sku,
                'expired' => $request->expired,
                'weight_unit' => 'gr',
                'weight' => $request->weight,
                'long_size' => $request->long_size,
                'width_size' => $request->width_size,
                'height_size' => $request->height_size,
                'slug' => slugify($request->name . '-' . Str::random(10)),
                'keywords' => $request->keyword,
                'have_variant' => false,
                'is_active' => true
            ]);
            if ($request->hasFile('product_image')) {
                foreach ($request->product_image as $key => $value) {
                    $file = $value;
                    $productImage = Str::random(10) . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('storage/images/product-images'), $productImage);
                    $request->merge(['product_image' => $productImage]);

                    ProductImage::create([
                        'product_id' => $product->id,
                        'image' => $productImage,
                    ]);
                }
            }
            DB::commit();
            return response()->json(['status' => true, 'message' => 'Produk berhasil ditambahkan']);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }

    public function edit(Product $product)
    {
        $data = [
            'title' => 'Edit Produk',
            'mods' => 'seller/product',
            'product' => $product,
            'isContainer' => true,
            'action' => route('seller.products.update', $product->hashid),
            'productCategories' => ProductCategory::where('is_active', true)->with('productSubCategory')->get(),
            'productSubCategories' => ProductSubCategory::where('product_category_id', $product->productSubCategory->productCategory->id)->where('is_active', true)->get(),
        ];

        return customView('seller.product.form', $data, 'backend');
    }

    public function update(ProductRequest $request, Product $product)
    {
        try {

            DB::beginTransaction();
            if ($request->hasFile('thumbnail')) {
                $file = $request->file('thumbnail');
                $thumbnail = Str::random(10) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('storage/images/products'), $thumbnail);
                $request->merge(['thumbnail' => $thumbnail]);
            } else {
                $thumbnail = $product->thumbnail;
            }

            $product->update([
                'seller_id' => auth()->user()->userable->id,
                'product_sub_category_id' => Hashids::decode($request->product_subcategory)[0],
                'name' => $request->name,
                'summary' => $request->summary,
                'description' => $request->description,
                'thumbnail'  => $thumbnail,
                'video' => $request->video,
                'min_order' => $request->min_order,
                'price' => stripCharacter($request->price),
                'stock' => $request->stock,
                'sku' => $request->sku,
                'expired' => $request->expired,
                'weight_unit' => 'gr',
                'weight' => $request->weight,
                'long_size' => $request->long_size,
                'width_size' => $request->width_size,
                'height_size' => $request->height_size,
                'slug' => slugify($request->name . '-' . Str::random(10)),
                'keywords' => $request->keyword,
                'have_variant' => false,
                'is_active' => true
            ]);
            if ($request->hasFile('product_image')) {
                foreach ($request->product_image as $key => $value) {
                    $file = $value;
                    $productImage = Str::random(10) . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('storage/images/product-images'), $productImage);
                    $request->merge(['product_image' => $productImage]);

                    ProductImage::create([
                        'product_id' => $product->id,
                        'image' => $productImage,
                    ]);
                }
            }
            DB::commit();
            return response()->json(['status' => true, 'message' => 'Produk berhasil diupdate']);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }
    public function destroy(Product $product)
    {
        try {

            if (File::exists(public_path('storage/images/products/' . $product->thumbnail))) {
                File::delete(public_path('storage/images/products/' . $product->thumbnail));
            }
            foreach ($product->productImage as $key => $value) {
                if (File::exists(public_path('storage/images/product-images/' . $value->image))) {
                    File::delete(public_path('storage/images/product-images/' . $value->image));
                }
            }

            $product->delete();

            return response()->json([
                'message' => 'Data telah dihapus',
            ]);
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                return response()->json([
                    'message' => 'Data tidak dapat dihapus karena sudah digunakan',
                ], 500);
            } else {
                return response()->json([
                    'message' => $e->getMessage(),
                    'trace' => $e->getTrace()
                ], 500);
            }
        }
    }

    public function getProductImages(Product $product)
    {
        return DataTables::of($product->productImage)->make(true);
    }

    public function deleteProductImages(ProductImage $productImage)
    {
        try {

            if (File::exists(public_path('storage/images/product-images/' . $productImage->image))) {
                File::delete(public_path('storage/images/product-images/' . $productImage->image));
            }
            $productImage->delete();

            return response()->json([
                'message' => 'Data telah dihapus',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ], 500);
        }
    }
}
