<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\HomeController;
use App\Http\Controllers\ProductDetailsController;



Route::get('/',  [HomeController::class, '__invoke'])->name('index');
Route::get('/product/{id}', [ProductDetailsController::class, '__invoke'])->name('items');