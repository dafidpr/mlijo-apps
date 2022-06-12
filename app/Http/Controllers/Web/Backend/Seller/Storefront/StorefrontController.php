<?php

namespace App\Http\Controllers\Web\Backend\Seller\Storefront;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Backend\Storefront\StorefrontRequest;
use App\Models\SellerCategory;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class StorefrontController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Daftar Etalase',
            'mods' => 'seller/storefront',
        ];

        return customView('seller.storefront.index', $data, 'backend');
    }

    public function getData()
    {

        return DataTables::of(SellerCategory::with('sellerProductCategory.product')->where('seller_id', auth()->user()->userable->id)->get())
            ->addColumn('product_count', function ($data) {
                return $data->sellerProductCategory->count();
            })->make(true);
    }

    public function store(StorefrontRequest $request)
    {
        try {
            $checkData = SellerCategory::where(['name' => $request->name])->first();
            if ($checkData) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Etalase toko sudah ada',
                ], 500);
            } else {

                if ($request->hasFile('icon')) {
                    $file = $request->file('icon');
                    $icon = Str::random(10) . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('storage/images/seller-categories'), $icon);
                    $request->merge(['icon' => $icon]);
                }

                SellerCategory::create([
                    'seller_id' => auth()->user()->userable->id,
                    'name' => $request->name,
                    'icon' => $icon,
                    'is_active' => true,
                    'is_default' => false
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
    public function update(StorefrontRequest $request, SellerCategory $sellerCategory)
    {

        try {
            if ($sellerCategory->name != $request->name) {

                $checkData = SellerCategory::where(['name' => $request->name])->first();
                if ($checkData) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Etalase toko sudah ada',
                    ], 500);
                } else {
                    $this->updateData($request, $sellerCategory);
                    return response()->json([
                        'message' => 'Data telah ditambahkan'
                    ]);
                }
            } else {
                $this->updateData($request, $sellerCategory);
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

    private function updateData($request, $sellerCategory)
    {
        if ($request->hasFile('icon')) {

            if ($sellerCategory->icon != 'default_category_seller.png' && File::exists(public_path('storage/images/seller-categories/' . $sellerCategory->icon))) {
                File::delete(public_path('storage/images/seller-categories/' . $sellerCategory->icon));
            }

            $file = $request->file('icon');
            $icon = Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/images/seller-categories'), $icon);
            $request->merge(['icon' => $icon]);
        } else {
            $icon = $sellerCategory->icon;
        }

        $sellerCategory->update([
            'seller_id' => auth()->user()->userable->id,
            'name' => $request->name,
            'icon' => $icon,
            'is_active' => true,
            'is_default' => false
        ]);
        return true;
    }



    public function show(SellerCategory $sellerCategory)
    {
        try {
            return response()->json([
                'status' => 'success',
                'data' => $sellerCategory
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ], 500);
        }
    }

    public function updateStatus(SellerCategory $sellerCategory)
    {
        if (\Request::ajax()) {
            try {
                $sellerCategory->update(['is_active' => ($sellerCategory->is_active) ? false : true]);

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

    public function destroy(SellerCategory $sellerCategory)
    {
        try {

            if ($sellerCategory->icon != 'default_category_seller.png' && File::exists(public_path('storage/images/seller-categories/' . $sellerCategory->icon))) {
                File::delete(public_path('storage/images/seller-categories/' . $sellerCategory->icon));
            }

            $sellerCategory->delete();

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
