<?php

namespace App\Http\Controllers\Web\Frontend\Wishlist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Wishlist',
        ];

        return view('frontend.wishlist.index', $data);
    }
}
