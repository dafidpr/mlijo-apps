<?php

use App\Http\Controllers\Web\Auth\CheckPointController;
use App\Http\Controllers\Web\Backend\Auth\AuthController;
use App\Http\Controllers\Web\Backend\Root\Dashboard\DashboardController;
use App\Http\Controllers\Web\Backend\Root\ProductCategory\ProductCategoryController as AppProductCategoryController;
use App\Http\Controllers\Web\Backend\Root\ProductSubCategory\ProductSubCategoryController as AppProductSubCategoryController;
use App\Http\Controllers\Web\Backend\Seller\Dashboard\DashboardController as AppDashboardController;
use App\Http\Controllers\Web\Backend\Seller\Income\IncomeController;
use App\Http\Controllers\Web\Backend\Seller\Order\OrderController;
use App\Http\Controllers\Web\Backend\Seller\Product\ProductController as AppProductController;
use App\Http\Controllers\Web\Backend\Seller\Setting\SellerSettingController;
use App\Http\Controllers\Web\Backend\Seller\Shipping\ShippingController;
use App\Http\Controllers\Web\Frontend\Cart\CartController;
use App\Http\Controllers\Web\Frontend\Home\HomeController;
use App\Http\Controllers\Web\Frontend\Product\ProductController;
use App\Http\Controllers\Web\Frontend\ProductSubCategory\ProductSubCategoryController;
use App\Http\Controllers\Web\Frontend\Wishlist\WishlistController;
use App\Http\Controllers\Web\Frontend\ProductCategory\ProductCategoryController;
use App\Http\Controllers\Web\Backend\Seller\Storefront\StorefrontController;
use App\Http\Controllers\Web\Backend\Seller\Storefront\StorefrontProductController;
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
        Route::prefix('dashboard')->middleware('can:read-seller-dashboards')->group(function () {
            Route::get('', [AppDashboardController::class, 'index'])->name('seller.dashboards');
            Route::get('sales-chart', [AppDashboardController::class, 'getSaleChart'])->name('seller.dashboards.get-sales-chart');
        });

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

            Route::prefix('{sellerCategory}/products')->group(function () {
                Route::get('', [StorefrontProductController::class, 'index'])->name('seller.storefronts.products');
                Route::get('get-data', [StorefrontProductController::class, 'getData'])->name('seller.storefronts.products.get-data');
                Route::get('get-data-product', [StorefrontProductController::class, 'getDataProduct'])->name('seller.storefronts.products.get-data-product');
                Route::post('store', [StorefrontProductController::class, 'store'])->name('seller.storefronts.products.store');
                Route::delete('{sellerProductCategory}/delete', [StorefrontProductController::class, 'destroy'])->name('seller.storefronts.products.destroy');
            });
        });
        // Shipping
        Route::prefix('shippings')->middleware('can:read-seller-storefront')->group(function () {
            Route::get('', [ShippingController::class, 'index'])->name('seller.shippings');
            Route::post('store', [ShippingController::class, 'store'])->name('seller.shippings.store')->middleware('can:create-seller-shipping');
        });
        // Order
        Route::prefix('orders')->middleware('can:read-seller-order')->group(function () {
            Route::get('', [OrderController::class, 'index'])->name('seller.orders');
            Route::get('get-data', [OrderController::class, 'getData'])->name('seller.orders.get-data');
            Route::get('{order}/show', [OrderController::class, 'show'])->name('seller.orders.show');
            Route::post('{order}/store-receipt', [OrderController::class, 'storeReceipt'])->name('seller.orders.store-receipt');
            Route::get('{order}/update-status/{status}', [OrderController::class, 'updateStatusOrder'])->name('seller.orders.update-status-order');
            Route::post('{order}/store-status', [OrderController::class, 'storeStatus'])->name('seller.orders.store-status');
            Route::get('{order}/show-tracking', [OrderController::class, 'showTracking'])->name('seller.orders.show-tracking');
            Route::get('{order}/get-products', [OrderController::class, 'getDataProducts'])->name('seller.orders.get-data-products');
            Route::get('{order}/invoice', [OrderController::class, 'invoice'])->name('seller.orders.invoice');
        });
        // Income
        Route::prefix('incomes')->middleware('can:read-seller-income')->group(function () {
            Route::get('', [IncomeController::class, 'index'])->name('seller.incomes');
            Route::get('get-release-income', [IncomeController::class, 'getReleaseIncome'])->name('seller.incomes.get-release-income');
            Route::get('get-not-release-income', [IncomeController::class, 'getNotReleaseIncome'])->name('seller.incomes.get-not-release-income');
        });
        // Setting
        Route::prefix('settings')->middleware('can:read-seller-setting')->group(function () {
            Route::get('', [SellerSettingController::class, 'index'])->name('seller.settings');
            Route::get('get-notes', [SellerSettingController::class, 'getNotes'])->name('seller.settings.get-notes');
        });
    });
});
