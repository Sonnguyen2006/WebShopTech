<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderModel;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function index(){
        $user = UserModel::all();
        return view("admin.user_management",compact("user"));
    }
    public function show($id)
    {
        // Lấy user kèm luôn danh sách orders
        $user = UserModel::with('orders')->findOrFail($id);
        $orders = OrderModel::where('user_id', $id)
                    ->orderBy('created_at', 'desc')
                    ->paginate(8);
        return view('admin.user_management.show',compact('user','orders'));
    }
}
