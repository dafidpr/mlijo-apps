<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckPointController extends Controller
{
    public function checkPoint()
    {
        $user = Auth::user();
        switch ($user->roles[0]->name) {
            case 'Administrator':
            case 'Developer':
                return redirect()->route('admin.dashboards');
                break;
            case 'Customer':
                return redirect()->route('frontend.home');
                break;
            case 'Seller':
                return redirect()->route('seller.dashboards');
                break;
            default:
                return abort(403);
                break;
        }
    }
}
