<?php

namespace App\Http\Controllers\Web\Frontend\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Keranjang',
        ];

        return view('frontend.cart.index', $data);
    }
}
