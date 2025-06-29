<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SiteMapController;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\Users\FaqController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\Users\HomeController;
use App\Http\Controllers\Users\PageController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Users\BlogController; 
use App\Http\Controllers\Users\CartsController;
use App\Http\Controllers\Users\SearchController;
use App\Http\Controllers\Users\AddressController;
use App\Http\Controllers\Users\PaymentController;
use App\Http\Controllers\Users\CheckoutController;
use App\Http\Controllers\BookAppointmentController;
use App\Http\Controllers\Users\PrescriptionController;
use App\Http\Controllers\Users\ProductDetailsController;
// Route::match(['get', 'post'], '/', [HomeController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, '__invoke'] )->name('dashboard');
    Route::match(['get', 'post'], '/',  [HomeController::class, 'Index'])->name('users.index');
Route::get('/dashboard',  [HomeController::class, 'Index'])->name('dashboard');
});

Route::get('/', [HomeController::class, 'Index'] )->name('users.index');

Route::get('/products', [ProductDetailsController::class, '__invoke'])->name('users.products');

Route::controller(CartsController::class)->group( function(){
Route::post('/cart/{id}',  'add')->name('carts.add');
Route::get('/carts/index/',  'Index')->name('carts.index');
Route::get('/delete/{id}',  'destroy')->name('carts.delete');
Route::post('updatecart', 'update')->name('carts.update');
Route::get('shop', 'update')->name('shops.index');
});

Route::controller(CheckoutController::class)->group(function(){
Route::get('/checkout/{cart?}', 'Index')->name('checkout.index');
Route::post('/checkout/shippinginformation', 'RegisterUser')->name('users.RegisterUser');
});

Route::controller(AddressController::class)->group(function(){
    Route::get('/checkout/address/index', 'ShippingAddress')->name('checkouts.changeAddress');
    Route::get('/checkout/address/change/{id}', 'UpdateDefaultAddress')->name('UpdateDefaultAddress');
    Route::get('/checkout/address/create', 'CreateAddress')->name('createAddress');
    Route::post('/checkout/address/store', 'StoreAddress')->name('storeAddress');
});


Route::get('/payment/callback', [PaymentController::class, 'handlePaystackCallback']);
Route::post('/checkout/payment', [PaymentController::class, 'InitiatePayment'])->name('payment.checkout');
Route::get('flutter/callback', [PaymentController::class, 'handleFlutterCallback'])->name('flutter.callback');




Route::controller(UserController::class)->group(function(){
    Route::get('/accounts/index', 'Index')->name('users.account.index');
    Route::get('/account/orders', 'Orders')->name('users.orders');
    Route::get('/account/orders/details/{id}', 'OrderDetails')->name('users.orders.details');
    Route::get('/account/address', 'Addresses')->name('users.account.address');
    Route::get('/account/address/edit/{id}', 'EditAddress')->name('users.address.edit');
    Route::post('/account/address/update/{id}', 'UpdateAddress')->name('users.address.update');
    Route::get('/account/address/create', 'CreateAddress')->name('users.address.create');
    Route::post('/account/address/store/', 'storeAddress')->name('users.address.store');
    Route::get('/account/address/delete/{id}', 'AddressDelete')->name('users.address.delete');
    Route::get('/account/recent/products/', 'recentViews')->name('users.recent.views');
    Route::get('/account/order/payments', 'OrderPayments')->name('users.order.payments');
    Route::get('/accounts/settings', 'AccountSettings')->name('users.account.settings');
    Route::post('/accounts/settings/update', 'UpdateAccountSettings')->name('users.settings.update');
});

Route::controller(SearchController::class)->group(function(){
    Route::get('/catalogs/{id?}', '__invoke')->name('products.search');
});

Route::controller(PageController::class)->group(function(){
Route::get('/pages', 'AboutUs')->name('pages');
Route::get('/pages/about', 'AboutUs')->name('about-us');
Route::get('/pages/terms', 'Terms')->name('pages.terms');
Route::get('/pages/privacypolicy', 'PrivacyPolicy')->name('PrivacyPolicy');
Route::get('/pages/contactus', 'ContactUs')->name('contact-us');
Route::get('/pages/products/', 'Products')->name('users.products');
Route::get('/pages/products/details/{id}', 'ProductDetails')->name('product.details');
Route::get('/pages/services', 'Services')->name('users.services');
Route::get('/pages/services/details/{id}', 'ServiceDetails')->name('service.details');
Route::get('/product/category/{id}', 'productsByCategory')->name('category.products');
Route::get('/pages/team/{id}', 'TeamDetails')->name('team.details');
Route::get('/pages/appointment', 'BookAppointment')->name('users.bookAppointment');
Route::get('/pages/faqs', 'Faqs')->name('users.faqs');
// Route::get('/accept-cookie', 'Accept')->name('cookie.accept');
});

// <!-- Route::middleware(['auth'])->group(function () {
//     Route::get('/pages/appointment', [PageController::class, 'BookAppointment'])->name('users.bookAppointment');
// }); -->
// Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointment.store');

Route::controller(PrescriptionController::class)->group(function(){

    Route::get('/upload/prescription', 'Index')->name('user.prescription');
    Route::post('/doctor/prescription', 'PrescriptionStore')->name('doctores.prescription');

});

Route::get('upload/sitemap', [SiteMapController::class, 'SiteMap'])->name('site.map');
                                    
Route::post('/accept-cookie', [CookieController::class, 'Accept'])->name('cookie.accept');


Route::get('blogs', [BlogController::class, 'Index'])->name('users.blogs');
Route::get('blogs/details/{id}', [BlogController::class, 'BlogDetails'])->name('blogs.details');
Route::get('/faq', [FaqController::class, '__invoke'])->name('faq.index');


Route::post('/newsletter/subscribe', [NewsLetterController::class, 'subscribe'])->name('newsletter.subscribe');
Route::post('/bookappoitment/store', [BookAppointmentController::class, 'store'])->name('appointment.store');
Route::post('/contact', [ContactController::class, 'contactSubmit'])->name('contact.submit');
Route::post('/blogs/{blog}/comments', [CommentController::class, 'submitComment'])->name('comment.submit');
