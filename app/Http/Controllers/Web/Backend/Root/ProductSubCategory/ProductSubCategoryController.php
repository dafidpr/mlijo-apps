<?php

namespace App\Http\Controllers\Web\Backend\Root\ProductSubCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Backend\ProductSubCategory\ProductSubCategoryRequest;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Vinkla\Hashids\Facades\Hashids;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;

class ProductSubCategoryController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Sub Kategori Produk',
            'mods' => 'root/product_sub_category',
            'productCategories' => ProductCategory::where('is_active', true)->get()
        ];

        return customView('root.product_sub_category.index', $data, 'backend');
    }
    public function getData()
    {
        return DataTables::of(ProductSubCategory::with(['productCategory', 'product'])->orderBy('created_at', 'desc')->get())
            ->addColumn('hashid', function ($data) {
                return Hashids::encode($data->id);
            })
            ->addColumn('category', function ($data) {
                return $data->productCategory->name;
            })
            ->addColumn('product_count', function ($data) {
                return $data->product->count();
            })
            ->make();
    }

    public function store(ProductSubCategoryRequest $request)
    {
        try {
            $checkData = ProductSubCategory::where(['slug' => slugify($request->name)])->first();
            if ($checkData) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Kategori produk sudah ada',
                ], 500);
            } else {

                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $image = Str::random(10) . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('storage/images/product-sub-categories'), $image);
                    $request->merge(['image' => $image]);
                }

                ProductSubCategory::create([
                    'product_category_id' => Hashids::decode($request->category)[0],
                    'name' => $request->name,
                    'image' => $image,
                    'description' => $request->description,
                    'slug' => slugify($request->name)
                ]);

                return response()->json([
                    'message' => 'Data telah ditambahkan'
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ], 500);
        }
    }
    public function update(ProductSubCategoryRequest $request, ProductSubCategory $productSubCategory)
    {

        try {
            if ($productSubCategory->slug != slugify($request->name)) {

                $checkData = ProductSubCategory::where(['slug' => slugify($request->name)])->first();
                if ($checkData) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Sub kategori produk sudah ada',
                    ], 500);
                } else {
                    $this->updateData($request, $productSubCategory);
                    return response()->json([
                        'message' => 'Data telah ditambahkan'
                    ]);
                }
            } else {
                $this->updateData($request, $productSubCategory);
                return response()->json([
                    'message' => 'Data telah ditambahkan'
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ], 500);
        }
    }

    private function updateData($request, $productSubCategory)
    {
        if ($request->hasFile('image')) {

            if (File::exists(public_path('storage/images/product-sub-categories/' . $productSubCategory->image))) {
                File::delete(public_path('storage/images/product-sub-categories/' . $productSubCategory->image));
            }

            $file = $request->file('image');
            $image = Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/images/product-sub-categories'), $image);
            $request->merge(['image' => $image]);
        } else {
            $image = $productSubCategory->image;
        }

        $productSubCategory->update([
            'product_category_id' => Hashids::decode($request->category)[0],
            'name' => $request->name,
            'image' => $image,
            'description' => $request->description,
            'slug' => slugify($request->name)
        ]);
        return true;
    }



    public function show(ProductSubCategory $productSubCategory)
    {
        try {
            return response()->json([
                'status' => 'success',
                'data' => $productSubCategory,
                'category' => Hashids::encode($productSubCategory->productCategory->id),
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ], 500);
        }
    }

    public function updateStatus(ProductSubCategory $productSubCategory)
    {
        if (\Request::ajax()) {
            try {
                $productSubCategory->update(['is_active' => ($productSubCategory->is_active) ? false : true]);

                return response()->json([
                    'message' => 'Data telah diperbarui'
                ]);
            } catch (Exception $e) {
                return response()->json([
                    'message' => $e->getMessage(),
                    'trace' => $e->getTrace()
                ], 500);
            }
        } else {
            abort(403);
        }
    }

    public function destroy(ProductSubCategory $productSubCategory)
    {
        try {

            if (File::exists(public_path('storage/images/product-sub-categories/' . $productSubCategory->image))) {
                File::delete(public_path('storage/images/product-sub-categories/' . $productSubCategory->image));
            }

            $productSubCategory->delete();

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
}
