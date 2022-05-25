<?php

use Illuminate\Http\Request;

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
