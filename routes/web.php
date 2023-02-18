<?php

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
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::group(['middleware' => 'auth'], function() {
    Route::group(['middleware' => 'role:administrator', 'prefix' => 'admin', 'as' => 'admin.'], function() {
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    });
    Route::group(['middleware' => 'role:penjual', 'prefix' => 'penjual', 'as' => 'penjual.'], function() {
        Route::resource('product', \App\Http\Controllers\Penjual\ProductController::class);
    });
    Route::group(['middleware' => 'role:kurir', 'prefix' => 'kurir', 'as' => 'kurir.'], function() {
        Route::resource('home', \App\Http\Controllers\Kurir\HomeController::class);
    });
    Route::group(['middleware' => 'role:murid', 'as' => 'murid.'], function() {
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
