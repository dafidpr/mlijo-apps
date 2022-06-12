<?php

namespace App\Http\Controllers\Web\Backend\Seller\Shipping;

use App\Http\Controllers\Controller;
use App\Models\SellerShipping;
use App\Models\Shipping;
use Exception;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;

class ShippingController extends Controller
{
    public function index()
    {
        $shippings = Shipping::all();
        $sellerShippings = SellerShipping::where('seller_id', auth()->user()->userable->id)->get();
        $dataShippings = [];
        foreach ($shippings as $shipping) {
            $dataShippings[$shipping->name] = [
                'id' => $shipping->hashid,
                'name' => $shipping->name,
                'picture' => $shipping->picture,
                'checked' => false,
            ];
            foreach ($sellerShippings as $key => $value) {
                if ($shipping->id == $value->shipping_id) {
                    $dataShippings[$shipping->name]['checked'] = true;
                }
            }
        }
        $data = [
            'title' => 'Daftar Pengiriman',
            'mods' => 'seller/shipping',
            'shippings' => $dataShippings,
        ];

        return customView('seller.shipping.index', $data, 'backend');
    }

    public function store(Request $request)
    {
        try {
            $data = [];
            SellerShipping::where('seller_id', auth()->user()->userable->id)->delete();
            $sellerShippings = SellerShipping::all();
            SellerShipping::query()->truncate();

            foreach ($sellerShippings as $key => $value) {
                array_push($data, [
                    'seller_id' => auth()->user()->userable->id,
                    'shipping_id' => $value->shipping_id,
                ]);
            }
            foreach ($request->shippings as $shipping) {
                array_push($data, [
                    'seller_id' => auth()->user()->userable->id,
                    'shipping_id' => Hashids::decode($shipping)[0],
                ]);
            }
            SellerShipping::insert($data);
            return response()->json(['status' => 'success', 'message' => 'Berhasil menyimpan data']);
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
