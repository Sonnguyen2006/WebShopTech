<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/search', [HomeController::class, 'search'])->name('products.search');
Route::get('/product/{product_id}', [ProductController::class, 'show'])->name('product.show');
Route::post('/cart/add/{product_id}', [CartController::class, 'add'])->name('cart.add');
