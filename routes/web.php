<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\AdminController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
