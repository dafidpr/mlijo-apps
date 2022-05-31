<?php

use App\Models\Cart;
use App\Models\ProductCategory;
use App\Models\Setting;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Vinkla\Hashids\Facades\Hashids;

if (!function_exists('customView')) {
    function customView($view, $data = [], $preffix = null)
    {
        if (\Request::ajax()) {
            return view(($preffix != null ? $preffix . '.' : '') . $view, $data);
        } else {
            return view(($preffix != null ? $preffix . '.' : '') . 'layouts.app', $data);
        }
    }
}

if (!function_exists('hashId')) {
    function hashId($id, $type = 'encode')
    {
        if ($type === 'encode') {
            return Hashids::encode($id);
        } else {
            return Hashids::decode($id);
        }
    }
}

if (!function_exists('getInfoLogin')) {
    function getInfoLogin()
    {
        return Auth::user();
    }
}

if (!function_exists('getAuthPermissions')) {
    function getAuthPermissions()
    {
        $permissionsName = auth()->user()->getAllPermissions()->map(function ($perm) {
            return $perm->name;
        });
        return implode(',', $permissionsName->toArray());
    }
}

if (!function_exists('getSetting')) {
    function getSetting($optionName, $instantGet = true)
    {
        $setting = Setting::where('option', $optionName)->first();
        return $instantGet ? $setting->value : $setting;
    }
}

if (!function_exists('stripCharacter')) {
    function stripCharacter($input)
    {
        return preg_replace("/[^0-9]/", "", $input);
    }
}

if (!function_exists('stripCurrencyRequest')) {
    function stripCurrencyRequest(Request $request, $currencyKey)
    {
        foreach ($currencyKey as $key => $crky) {
            if ($request->has($crky)) {
                $request->merge([$crky => $request->has($crky) ? stripCharacter($request[$crky]) : null]);
            }
        }

        return $request;
    }
}
if (!function_exists('slugify')) {
    function slugify($string, $divider = '-')
    {
        // replace non letter or digits by divider
        $string = preg_replace('~[^\pL\d]+~u', $divider, $string);
        // transliterate
        $string = iconv('utf-8', 'us-ascii//TRANSLIT', $string);
        // remove unwanted characters
        $string = preg_replace('~[^-\w]+~', '', $string);
        // trim
        $string = trim($string, $divider);
        // remove duplicate divider
        $string = preg_replace('~-+~', $divider, $string);
        // lowercase
        $string = strtolower($string);
        if (empty($string)) {
            return 'n-a';
        }
        return $string;
    }
}
if (!function_exists('getProductCategories')) {
    function getProductCategories($limit = null, $orderBy = null, $orderType = null, $instantGet = true)
    {
        $productCategories = ProductCategory::where('is_active', true)->with('productSubCategory.product');
        if ($limit != null) {
            $productCategories = $productCategories->take($limit);
        }
        if ($orderBy != null && $orderType != null) {
            $productCategories = $productCategories->orderBy($orderBy, $orderType);
        }
        return $instantGet == true ? $productCategories->get() : $productCategories;
    }
}
if (!function_exists('getCart')) {
    function getCart($instantGet = true, $limit = 0, $sum = false)
    {
        $carts = [];
        if (auth()->user() && (auth()->user()->roles[0]->name == 'Customer')) {
            $customer = auth()->user()->userable;
            $carts = Cart::where(['customer_id' => $customer->id, 'is_checkout' => false]);
            if ($limit != 0) {
                $carts = $carts->take($limit);
            }
            if ($sum == true) {
                $total = 0;
                foreach ($carts->get() as $key => $value) {
                    $total += $value->product->price * $value->quantity;
                }
                return $total;
            }
            return $instantGet == true ? $carts->get() : $carts;
        }
        return $carts;
    }
}
if (!function_exists('getWishlist')) {
    function getWishlist($instantGet = true, $limit = 0)
    {
        $wishlists = [];
        if (auth()->user() && (auth()->user()->roles[0]->name == 'Customer')) {
            $customer = auth()->user()->userable;
            $wishlists = Wishlist::where(['customer_id' => $customer->id]);
            if ($limit != 0) {
                $wishlists = $wishlists->take($limit);
            }
            return $instantGet == true ? $wishlists->get() : $wishlists;
        }
        return $wishlists;
    }
}
