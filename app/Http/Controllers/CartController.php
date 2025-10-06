<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

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
                'product_price' => $product->product_price,
                'product_image' => $product->product_image,
                'quantity'      => 1,
            ];
        }

        // Cập nhật session
        session(['cart' => $cart]);
        session(['cart_count' => array_sum(array_column($cart, 'quantity'))]);

        return redirect()->back()->with('success', 'Đã thêm vào giỏ hàng!');
    }
}
