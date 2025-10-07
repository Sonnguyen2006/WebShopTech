<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
Route::get('/register', [UserController::class, 'registerform'])->name('registerform');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/login',[UserController::class,'loginform'])->name('loginform');
Route::post('/login',[UserController::class,'login'])->name('login');
