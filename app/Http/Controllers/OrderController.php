<?php

namespace App\Http\Controllers;

use App\Models\OrderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        //lấy id người dùng đăng nhập từ sessionn
        $userId = Auth::id();
        //lấy từ DB nơi người dùng trùng với id
        $orders = OrderModel::where('user_id', $userId)
        //sấp xếp
            ->OrderBy('created_at', 'desc')
            ->get();
            //dùng compact đẩy dữ liệu ra orders.index
        return view('orders.index', compact('orders'));
    }

}
