<?php

use App\Http\Controllers\Web\Auth\CheckPointController;
use App\Http\Controllers\Web\Backend\Auth\AuthController;
use App\Http\Controllers\Web\Backend\Root\Dashboard\DashboardController;
use App\Http\Controllers\Web\Frontend\Cart\CartController;
use App\Http\Controllers\Web\Frontend\Home\HomeController;
use App\Http\Controllers\Web\Frontend\Product\ProductController;
use App\Http\Controllers\Web\Frontend\ProductSubCategory\ProductSubCategoryController;
use App\Http\Controllers\Web\Frontend\Wishlist\WishlistController;
use App\Http\Controllers\Web\Frontend\ProductCategory\ProductCategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Front End Route
Route::get('/', [HomeController::class, 'index'])->name('frontend.home');
Route::get('sub-kategori/{slug}', [ProductSubCategoryController::class, 'index'])->name('frontend.sub-category');
Route::get('kategori/{slug}', [ProductSubCategoryController::class, 'index'])->name('frontend.category');
Route::get('produk/{slug}', [ProductController::class, 'index'])->name('frontend.product');
Route::get('wishlists', [WishlistController::class, 'index'])->name('frontend.wishlists')->middleware('customer.protected');
Route::get('keranjang', [CartController::class, 'index'])->name('frontend.carts')->middleware('customer.protected');
Route::get('/login', function () {
    return view('frontend.auth.login', ['title' => 'Masuk']);
})->middleware(['guest:' . config('fortify.guard')])->name('frontend.login');
Route::get('/register', function () {
    return view('frontend.auth.register', ['title' => 'Registrasi']);
})->middleware(['guest:' . config('fortify.guard')])->name('frontend.register');
Route::get('categories/{slug}', [ProductCategoryController::class, 'index'])->name('frontend.categories');

// Back End Route
Route::get('cpanel/auth', function () {
    return view('backend.auth.login');
})->middleware(['guest:' . config('fortify.guard')])->name('login');

Route::get('cpanel/forgot-passord', function () {
    return view('backend.auth.forgot-password');
})->middleware(['guest:' . config('fortify.guard')])->name('password.request');

Route::get('cpanel/reset-password', function () {
    return view('backend.auth.reset-password', ['request' => Request::all()]);
})->middleware(['guest:' . config('fortify.guard')])->name('password.reset');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    // Check point
    Route::get('/check-point', [CheckPointController::class, 'checkPoint'])->name('check-point');
    // Route for administrator
    Route::prefix('administrator')->middleware('role:Developer|Administrator')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboards');
    });
});
