<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function admin(){
        return view('admin.home');
    }
    public function logout()
{
    Auth::logout(); // dùng guard mặc định
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect()->route('home'); // hoặc route login bình thường
}
}
