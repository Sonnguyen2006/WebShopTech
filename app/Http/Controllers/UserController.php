<?php

namespace App\Http\Controllers;



use App\Models\UserModel;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function registerform() {
        return view('register');
    }
    public function register($request) {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        UserModel::create([
            'name'=>$request->name,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
         return redirect('/register')->with('success', 'Đăng ký thành công! Chúc mừng bạn!');

      
    }
    public function loginform(){
        return view('login');
    }
    public function login($request){
        $request->validate([
            'username'=>'required|string',
            'pasword'=>'required|string'
        ]);
    }
}
