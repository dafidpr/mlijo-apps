<?php

namespace App\Http\Controllers\Web\Backend\Root\ProductCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Backend\ProductCategory\ProductCategoryRequest;
use App\Models\ProductCategory;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Kategori Produk',
            'mods' => 'root/product_category',
        ];

        return customView('root.product_category.index', $data, 'backend');
    }
    public function getData()
    {
        return DataTables::of(ProductCategory::orderBy('created_at', 'desc')->get())->addColumn('hashid', function ($data) {
            return Hashids::encode($data->id);
        })->make();
    }

    public function store(ProductCategoryRequest $request)
    {
        try {
            $checkData = ProductCategory::where(['slug' => slugify($request->name)])->first();
            if ($checkData) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Kategori produk sudah ada',
                ], 500);
            } else {

                if ($request->hasFile('icon')) {
                    $file = $request->file('icon');
                    $icon = Str::random(10) . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('storage/images/product-categories'), $icon);
                    $request->merge(['icon' => $icon]);
                }

                ProductCategory::create([
                    'name' => $request->name,
                    'icon' => $icon,
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
    public function update(ProductCategoryRequest $request, ProductCategory $productCategory)
    {

        try {
            if ($productCategory->slug != slugify($request->name)) {

                $checkData = ProductCategory::where(['slug' => slugify($request->name)])->first();
                if ($checkData) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Kategori produk sudah ada',
                    ], 500);
                } else {
                    $this->updateData($request, $productCategory);
                    return response()->json([
                        'message' => 'Data telah ditambahkan'
                    ]);
                }
            } else {
                $this->updateData($request, $productCategory);
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

    private function updateData($request, $productCategory)
    {
        if ($request->hasFile('icon')) {

            if (File::exists(public_path('storage/images/product-categories/' . $productCategory->icon))) {
                File::delete(public_path('storage/images/product-categories/' . $productCategory->icon));
            }

            $file = $request->file('icon');
            $icon = Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/images/product-categories'), $icon);
            $request->merge(['icon' => $icon]);
        } else {
            $icon = $productCategory->icon;
        }

        $productCategory->update([
            'name' => $request->name,
            'icon' => $icon,
            'description' => $request->description,
            'slug' => slugify($request->name)
        ]);
        return true;
    }



    public function show(ProductCategory $productCategory)
    {
        try {
            return response()->json([
                'status' => 'success',
                'data' => $productCategory
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ], 500);
        }
    }

    public function updateStatus(ProductCategory $productCategory)
    {
        if (\Request::ajax()) {
            try {
                $productCategory->update(['is_active' => ($productCategory->is_active) ? false : true]);

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

    public function destroy(ProductCategory $productCategory)
    {
        try {

            if (File::exists(public_path('storage/images/product-categories/' . $productCategory->icon))) {
                File::delete(public_path('storage/images/product-categories/' . $productCategory->icon));
            }

            $productCategory->delete();

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
