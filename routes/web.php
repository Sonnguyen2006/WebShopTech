<?php

use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\ProductController as UserProductController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserManagement;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController as UserOrderController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;



use Illuminate\Support\Facades\Auth;

    
Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->middleware([AdminMiddleware::class])->group(function(){
    Route::get('/', [AdminController::class, 'admin'])->name('admin');
    Route::get('/create',[AdminProductController::class,'createform'])->name('admin.createform');
    Route::post('/create',[AdminProductController::class,'create'])->name('create');
    // ✅ Trang quản lý tất cả đơn hàng
    Route::get('/order', [AdminOrderController::class, 'order'])
        ->name('order');

    // ✅ Cập nhật trạng thái đơn hàng
    Route::patch('/admin/orders/update-status/{order_id}', [AdminOrderController::class, 'UpdateStatus'])
        ->name('orders.updateStatus');
        // Trang chi tiết người dùng
     Route::get('/users/{user_id}', [UserManagementController::class, 'show'])->name('admin.users.show');
     Route::get('/user_management',[UserManagementController::class,'index'])->name('edit_users');
});


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
Route::get('/product/{product_id}', [UserProductController::class, 'show'])->name('product.show');
Route::post('/cart/add/{product_id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/category/{slug}', [UserProductController::class, 'category'])->name('category.show');
Route::get('/promotion', [UserProductController::class, 'promotion'])->name('promotion');
// Route AJAX gợi ý autocomplete
Route::get('/search-suggestions', [HomeController::class, 'suggestions'])->name('search.suggestions');

//show ra các sản phẩn đã cho vào giỏ hàng
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::middleware([UserMiddleware::class])->group(function(){
    // xóa đơn hàng đã lựa chọn
    Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
    //hoàn tất quá trình checkout
    Route::post('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    //hiển thị trang order theo tên người dùng
    Route::get('/order/{username}', [UserOrderController::class, 'index'])->name('order.index');
});
