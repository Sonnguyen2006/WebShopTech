<?php

namespace App\Http\Controllers\Admin;
use App\Models\OrderModel;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function order()
    {
      $orders=OrderModel::with('user',)->latest()->get();
      return view('admin.order', compact('orders'));
    }

    public function UpdateStatus(Request $request, $order_id)
    {
        $request->validate([
            'status'=>'required|string',
        ]);
        $order=OrderModel::findOrFail($order_id);

        $order->update([
            'status'=>$request->status
        ]);
        $order->save();
        return redirect()->route('order')->with('success', 'Cập nhật trạng thái đơn hàng thành công!');
    }

}


