<?php

use App\Http\Controllers\Users\AddressController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\HomeController;
use App\Http\Controllers\Users\ProductDetailsController;
use App\Http\Controllers\Users\CartsController;
use App\Http\Controllers\Users\CheckoutController;
use App\Http\Controllers\Users\PaymentController;

Route::get('/',  [HomeController::class, '__invoke'])->name('users.index');
Route::get('/dashboard',  [HomeController::class, '__invoke'])->name('users.index');
Route::get('/products/{id}/{url}', [ProductDetailsController::class, '__invoke'])->name('users.products');

Route::controller(CartsController::class)->group( function(){
Route::get('/cart/{id}',  'add')->name('carts.add');
Route::get('/carts/index/',  'Index')->name('carts.index');
Route::get('/delete/{id}',  'destroy')->name('carts.delete');
Route::post('updatecart', 'update')->name('carts.update');
Route::get('shop', 'update')->name('shops.index');
});

Route::controller(CheckoutController::class)->group(function(){
Route::get('/checkout/{cart?}', 'Index')->name('checkout.index');
});

Route::controller(AddressController::class)->group(function(){
    Route::get('/checkout/address', 'ShippingAddress')->name('checkouts.changeAddress');
    Route::get('/checkout/address/change/{id}', 'UpdateDefaultAddress')->name('UpdateDefaultAddress');
    Route::get('/checkout/address/create', 'CreateAddress')->name('createAddress');
    Route::post('/checkout/address/store', 'StoreAddress')->name('storeAddress');
});

Route::post('/pay', [PaymentController::class, 'redirectToGateway'])->name('paystack.checkout');
Route::get('/payment/callback', [PaymentController::class, 'handleGatewayCallback']);