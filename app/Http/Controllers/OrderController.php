<?php

namespace App\Http\Controllers;

use App\Models\OrderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        $userId = Auth::id();
        $order = OrderModel::where('user_id', $userId)
            ->OrderBy('create_at', 'desc')
            ->get();
        return view('orders.index', compact('orders'));
    }
}
