<?php

namespace App\Http\Controllers\Web\Backend\Seller\Setting;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use App\Models\SellerNote;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class SellerSettingController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Pengaturan Toko',
            'mods' => 'seller/setting',
            'setting' => auth()->user()->userable,
        ];

        return customView('seller.setting.index', $data, 'backend');
    }

    public function getNotes()
    {
        return DataTables::of(SellerNote::where('seller_id', auth()->user()->userable->id)->get())->rawColumns(['note'])->make(true);
    }

    public function updateStatus($status)
    {
        try {
            auth()->user()->userable->update([
                'status' => $status
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Status toko berhasil diubah'
            ]);
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function updateSlogan(Request $request)
    {
        try {
            auth()->user()->userable->update([
                'store_slogan' => $request->slogan,
                'store_description' => $request->description,
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Informasi toko berhasil diubah'
            ]);
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
    public function updateSocial(Request $request)
    {
        try {
            auth()->user()->userable->update([
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'twitter' => $request->twitter,
                'tiktok' => $request->tiktok,
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Informasi toko berhasil diubah'
            ]);
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function showInformation()
    {
        try {
            return response()->json([
                'status' => 'success',
                'data' => auth()->user()->userable
            ]);
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
    public function updateInfo(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'domain' => 'required',
        ]);
        try {
            if ($request->domain != auth()->user()->userable->store_slug) {
                $check = Seller::where('store_slug', $request->domain)->first();
                if ($check) {
                    return response()->json(['status' => 'error', 'message' => 'Domain sudah digunakan'], 500);
                }
            }
            auth()->user()->userable->update([
                'store_name' => $request->name,
                'store_slug' => $request->domain,
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Informasi toko berhasil diubah'
            ]);
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
    public function updateProfile(Request $request)
    {
        $request->validate([
            'profile' => 'required|mimes:png,jpg,jpeg',
        ]);
        try {
            $seller = auth()->user()->userable;
            if ($request->hasFile('profile')) {

                if ($seller->store_profile_path != 'default_store.png' && File::exists(public_path('storage/images/sellers/' . $seller->store_profile_path))) {
                    File::delete(public_path('storage/images/sellers/' . $seller->store_profile_path));
                }
                $file = $request->file('profile');
                $icon = Str::random(10) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('storage/images/sellers'), $icon);
                $request->merge(['profile' => $icon]);
            } else {
                $icon = $seller->store_profile_path;
            }
            $seller->update([
                'store_profile_path' => $icon,
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Profil toko berhasil diubah'
            ]);
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
    public function updateCover(Request $request)
    {
        $request->validate([
            'cover' => 'required|mimes:png,jpg,jpeg',
        ]);
        try {
            $seller = auth()->user()->userable;
            if ($request->hasFile('cover')) {

                if ($seller->store_cover_path != 'default_cover_store.png' && File::exists(public_path('storage/images/sellers/' . $seller->store_cover_path))) {
                    File::delete(public_path('storage/images/sellers/' . $seller->store_cover_path));
                }
                $file = $request->file('cover');
                $icon = Str::random(10) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('storage/images/sellers'), $icon);
                $request->merge(['cover' => $icon]);
            } else {
                $icon = $seller->store_cover_path;
            }
            $seller->update([
                'store_cover_path' => $icon,
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Cover toko berhasil diubah'
            ]);
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
