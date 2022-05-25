<?php

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

// if (!function_exists('getSetting')) {
//     function getSetting($optionName, $instantGet = true)
//     {
//         $setting = Setting::where('option', $optionName)->first();
//         return $instantGet ? $setting->value : $setting;
//     }
// }

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
