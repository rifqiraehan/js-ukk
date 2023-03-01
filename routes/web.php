<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
});

Route::get('logout', function () {
    return redirect('/');
});

Route::group(['middleware' => 'auth'], function() {
    Route::group(['middleware' => 'role:Administrator', 'as' => 'admin.'], function() {
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
        Route::resource('categories', \App\Http\Controllers\Admin\CategoryProductController::class);
    });
    Route::group(['middleware' => 'role:Penjual', 'prefix' => 'dashboard', 'as' => 'penjual.'], function() {
        Route::resource('product', \App\Http\Controllers\Penjual\ProductController::class);
        Route::resource('order', \App\Http\Controllers\Penjual\OrderController::class);
        Route::resource('laporan', \App\Http\Controllers\Penjual\LaporanPenjual::class);
    });
    Route::group(['middleware' => 'role:Murid', 'as' => 'murid.'], function() {
        Route::resource('product', \App\Http\Controllers\Murid\HomeController::class);

        Route::resource('cart', \App\Http\Controllers\Murid\CartController::class)->only(['index', 'store', 'destroy']);
        Route::post('checkout', [\App\Http\Controllers\Murid\CheckoutController::class, 'index'])->name('cart.checkout');
        Route::post('checkout/store', [\App\Http\Controllers\Murid\CheckoutController::class, 'store'])->name('cart.checkout.store');

        Route::get('checkout',function(){
            return redirect()->route('murid.cart.index');
        });

        Route::resource('order', \App\Http\Controllers\Murid\OrderController::class)->only(['index', 'show', 'destroy']);
    });
});
