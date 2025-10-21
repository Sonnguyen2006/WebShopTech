<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
    
Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
Route::get('/register', [UserController::class, 'registerform'])->name('registerform');
Route::post('/register', [UserController::class, 'register'])->name('register');
// Route::get('/login',[UserController::class,'loginform'])->name('loginform');
// Route::post('/login',[UserController::class,'login'])->name('login');
// Route::post('/logout',[UserController::class,'logout'])->name('logout');
Route::middleware(['web'])->group(function () {
    Route::get('/home', [HomeController::class, 'home'])->name('home');
    Route::get('/login', [UserController::class, 'loginform'])->name('loginform');
    Route::post('/login', [UserController::class, 'login'])->name('login');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});
Route::get('/search', [HomeController::class, 'search'])->name('products.search');
Route::get('/product/{product_id}', [ProductController::class, 'show'])->name('product.show');
Route::post('/cart/add/{product_id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/category/{slug}', [ProductController::class, 'category'])->name('category.show');
Route::get('/promotion', [ProductController::class, 'promotion'])->name('promotion');
//show ra các sản phẩn đã cho vào giỏ hàng
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
// xóa đơn hàng đã lựa chọn
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
//hoàn tất quá trình checkout
Route::post('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
//hiển thị trang order theo tên người dùng
Route::get('/order/{username}', [OrderController::class, 'index'])->name('order.index');