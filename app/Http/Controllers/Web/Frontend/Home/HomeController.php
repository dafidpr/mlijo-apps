<?php

namespace App\Http\Controllers\Web\Frontend\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Belanja Kebutuhan Sehari-hari Terlengkap se-Indonesia',
        ];

        return view('frontend.home.index', $data);
    }
}
