<?php

namespace App\Http\Controllers;



use App\Models\UserModel;
use GuzzleHttp\Psr7\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function registerform()
    {
        return view('register');
    }
    public function register(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'nullable|string|in:user,admin'
        ]);
        UserModel::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role ?? 'user'
        ]);
        return redirect('/home')->with('success', 'Đăng ký thành công! Chúc mừng bạn!');
    }

    public function loginform()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            if (Auth::user()->role === 'admin') {
                return redirect('/admin')->with('success', 'Đăng nhập thành công! Chúc mừng bạn!');
            }
            return redirect('/home')->with('success', 'Đăng nhập thành công! Chúc mừng bạn!');
        }
        return back()->withErrors(['message' => 'Tài khoản hoặc mật khẩu không đúng!']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/home')->with('success', 'Đăng xuất thành công!');
    }

    public function profile($id)
    {
        $user = UserModel::with(['orders.orderDetails.product'])->findOrFail($id);

        // Nhóm theo ngày mua
        $ordersByDate = $user->orders->groupBy(function ($order) {
            return $order->created_at->format('d-m-Y');
        });

        return view('profile', compact('user', 'ordersByDate'));
    }
    

}
