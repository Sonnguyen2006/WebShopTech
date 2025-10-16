<?php

namespace App\Http\Controllers;

use App\Models\OrderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        $userId = Auth::id();
        $orders = OrderModel::where('user_id', $userId)
            ->OrderBy('created_at', 'desc')
            ->get();
        return view('orders.index', compact('orders'));
    }

}
