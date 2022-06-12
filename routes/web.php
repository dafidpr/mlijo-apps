<?php

use App\Http\Controllers\Web\Auth\CheckPointController;
use App\Http\Controllers\Web\Backend\Auth\AuthController;
use App\Http\Controllers\Web\Backend\Root\Dashboard\DashboardController;
use App\Http\Controllers\Web\Backend\Root\ProductCategory\ProductCategoryController as AppProductCategoryController;
use App\Http\Controllers\Web\Backend\Root\ProductSubCategory\ProductSubCategoryController as AppProductSubCategoryController;
use App\Http\Controllers\Web\Backend\Seller\Dashboard\DashboardController as AppDashboardController;
use App\Http\Controllers\Web\Backend\Seller\Product\ProductController as AppProductController;
use App\Http\Controllers\Web\Backend\Seller\Shipping\ShippingController;
use App\Http\Controllers\Web\Frontend\Cart\CartController;
use App\Http\Controllers\Web\Frontend\Home\HomeController;
use App\Http\Controllers\Web\Frontend\Product\ProductController;
use App\Http\Controllers\Web\Frontend\ProductSubCategory\ProductSubCategoryController;
use App\Http\Controllers\Web\Frontend\Wishlist\WishlistController;
use App\Http\Controllers\Web\Frontend\ProductCategory\ProductCategoryController;
use App\Http\Controllers\Web\Backend\Seller\Storefront\StorefrontController;
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
Route::get('kategori/{slug}', [ProductCategoryController::class, 'index'])->name('frontend.category');
Route::get('produk/{slug}', [ProductController::class, 'index'])->name('frontend.product');
Route::get('wishlists', [WishlistController::class, 'index'])->name('frontend.wishlists')->middleware('customer.protected');
Route::get('keranjang', [CartController::class, 'index'])->name('frontend.carts')->middleware('customer.protected');
Route::get('/login', function () {
    return view('frontend.auth.login', ['title' => 'Masuk']);
})->middleware(['guest:' . config('fortify.guard')])->name('frontend.login');
Route::get('/register', function () {
    return view('frontend.auth.register', ['title' => 'Registrasi']);
})->middleware(['guest:' . config('fortify.guard')])->name('frontend.register');

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
        Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboards')->middleware('can:read-admin-dashboards');
        // Product Category Route
        Route::prefix('product-categories')->middleware('can:read-admin-product-categories')->group(function () {
            Route::get('', [AppProductCategoryController::class, 'index'])->name('admin.product-categories')->middleware('can:read-admin-product-categories');
            Route::get('get-data', [AppProductCategoryController::class, 'getData'])->name('admin.product-categories.get-data')->middleware('can:read-admin-product-categories');
            Route::post('store', [AppProductCategoryController::class, 'store'])->name('admin.product-categories.store')->middleware('can:create-admin-product-categories');
            Route::get('{productCategory}/show', [AppProductCategoryController::class, 'show'])->name('admin.product-categories.update')->middleware('can:update-admin-product-categories');
            Route::post('{productCategory}/update', [AppProductCategoryController::class, 'update'])->name('admin.product-categories.update')->middleware('can:update-admin-product-categories');
            Route::delete('{productCategory}/delete', [AppProductCategoryController::class, 'destroy'])->name('admin.product-categories.delete')->middleware('can:delete-admin-product-categories');
            Route::get('{productCategory}/update-status', [AppProductCategoryController::class, 'updateStatus'])->name('admin.product-categories.update-status')->middleware('can:update-admin-product-categories');
        });
        // Product Sub Category Route
        Route::prefix('product-sub-categories')->middleware('can:read-admin-product-sub-categories')->group(function () {
            Route::get('', [AppProductSubCategoryController::class, 'index'])->name('admin.product-sub-categories')->middleware('can:read-admin-product-sub-categories');
            Route::get('get-data', [AppProductSubCategoryController::class, 'getData'])->name('admin.product-sub-categories.get-data')->middleware('can:read-admin-product-sub-categories');
            Route::post('store', [AppProductSubCategoryController::class, 'store'])->name('admin.product-sub-categories.store')->middleware('can:create-admin-product-sub-categories');
            Route::get('{productSubCategory}/show', [AppProductSubCategoryController::class, 'show'])->name('admin.product-sub-categories.update')->middleware('can:update-admin-product-sub-categories');
            Route::post('{productSubCategory}/update', [AppProductSubCategoryController::class, 'update'])->name('admin.product-sub-categories.update')->middleware('can:update-admin-product-sub-categories');
            Route::delete('{productSubCategory}/delete', [AppProductSubCategoryController::class, 'destroy'])->name('admin.product-sub-categories.delete')->middleware('can:delete-admin-product-sub-categories');
            Route::get('{productSubCategory}/update-status', [AppProductSubCategoryController::class, 'updateStatus'])->name('admin.product-sub-categories.update-status')->middleware('can:update-admin-product-sub-categories');
        });
    });

    Route::prefix('seller')->middleware('role:Seller')->group(function () {
        Route::get('dashboard', [AppDashboardController::class, 'index'])->name('seller.dashboards');

        // Product
        Route::prefix('products')->middleware('can:read-seller-products')->group(function () {
            Route::get('', [AppProductController::class, 'index'])->name('seller.products');
            Route::get('get-data', [AppProductController::class, 'getData'])->name('seller.products.get-data');
        });
        // Storefront
        Route::prefix('storefronts')->middleware('can:read-seller-storefront')->group(function () {
            Route::get('', [StorefrontController::class, 'index'])->name('seller.storefronts');
            Route::get('get-data', [StorefrontController::class, 'getData'])->name('seller.storefronts.get-data');
            Route::post('store', [StorefrontController::class, 'store'])->name('seller.storefronts.store')->middleware('can:create-seller-storefront');
            Route::get('{sellerCategory}/show', [StorefrontController::class, 'show'])->name('seller.storefronts.update')->middleware('can:update-seller-storefront');
            Route::post('{sellerCategory}/update', [StorefrontController::class, 'update'])->name('seller.storefronts.update')->middleware('can:update-seller-storefront');
            Route::delete('{sellerCategory}/delete', [StorefrontController::class, 'destroy'])->name('seller.storefronts.delete')->middleware('can:delete-seller-storefront');
            Route::get('{sellerCategory}/update-status', [StorefrontController::class, 'updateStatus'])->name('seller.storefronts.update-status')->middleware('can:update-seller-storefront');
        });
        // Shipping
        Route::prefix('shippings')->middleware('can:read-seller-storefront')->group(function () {
            Route::get('', [ShippingController::class, 'index'])->name('seller.shippings');
            Route::post('store', [ShippingController::class, 'store'])->name('seller.shippings.store')->middleware('can:create-seller-shipping');
        });
    });
});
