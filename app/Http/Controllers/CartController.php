<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Models\OrderModel;
use App\Models\ProductModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CartController extends Controller
{
    // Thêm sản phẩm vào giỏ
    public function add($product_id)
    {
        //lấy trong bảng product có product_id trùng với product_id của name
        $product = ProductModel::where('product_id', $product_id)->firstOrFail();
        //tạo session cho cart
        $cart = session()->get('cart', []);
        //nếu có sesstion nữa thì sẽ thêm số lượng +1 mỗi lần
        if (isset($cart[$product_id])) {
            $cart[$product_id]['quantity']++;
        } else {
            $cart[$product_id] = [
                'product_name'  => $product->product_name,
                'product_cost' => $product->final_price,
                'product_image' => $product->product_image,
                'discount'      => $product->discount,
                'quantity'      => 1,
            ];
        }

        // Cập nhật session
        session(['cart' => $cart]);
        session(['cart_count' => array_sum(array_column($cart, 'quantity'))]);

        return redirect()->back()->with('success', 'Đã thêm vào giỏ hàng!');
    }
    public function index() {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }
    public function checkout(Request $request)
    {
        $user = Auth::user();
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Giỏ hàng trống!');
        }

        // Tạo mã đơn hàng
        $order_id = 'ORD' . strtoupper(Str::random(6));

        // Tính tổng tiền
        $total_amount = 0;
        foreach ($cart as $item) {

            $total_amount += $item['product_cost'] * (1 - $item['discount']/100) * $item['quantity'];
        }

        // Tạo Order
        $order = OrderModel::create([
            'order_id'       => $order_id,
            'user_id'        => $user->user_id,
            'username'       => Auth::user()->name,
            'email'          => Auth::user()->email,
            'address'        => $request->address ?? '',
            'total_amount'   => $total_amount,
            'status'         => 'pending',
            'payment_method' => $request->payment_method ?? 'COD',
        ]);

        // Tạo OrderDetail cho từng sản phẩm
        foreach ($cart as $product_id => $item) {
            
            $finalPrice = isset($item['discount']) && $item['discount'] > 0
                ? $item['product_cost'] * (1 - $item['discount'] / 100)
                : $item['product_cost'];
            OrderDetail::create([
                'order_id'   => $order_id,
                'product_id' => $product_id,
                'quantity'   => $item['quantity'],
                'price'      => $finalPrice,
            ]);
        }

        // Xóa giỏ hàng
        session()->forget('cart');
        session(['cart_count' => 0]);

        return redirect()->route('order.index', ['username' => Auth::user()->name])->with('success', 'Đặt hàng thành công!');
    }    




    public function remove(Request $request){
        $cart = session()->get('cart', []);

        if(isset($cart[$request->id])){
            if($cart[$request->id]['quantity'] > 1){
                $cart[$request->id]['quantity']--;
            } else {
                unset($cart[$request->id]);
            }
            session()->put('cart', $cart);

            // Cập nhật số lượng tổng
            session(['cart_count' => array_sum(array_map(fn($item) => $item['quantity'], session('cart', [])))]);

        }

        return redirect()->back();
    }



}
