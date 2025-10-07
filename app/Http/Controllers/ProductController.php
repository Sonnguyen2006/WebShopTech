<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($product_id ){
        $product = ProductModel::where('product_id', $product_id )->FirstOrFail();
        return view ('products.show',compact('product'));
    }
    public function category($slug)
    {
        // Map slug -> tên danh mục trong DB
        $categoryMap = [
            'dien-thoai' => 'Điện thoại',
            'laptop' => 'Laptop',
            'tai-nghe' => 'Tai nghe',
            'man-hinh' => 'Màn hình',
        ];

        $categoryName = $categoryMap[$slug] ?? null;

        if (!$categoryName) {
            abort(404, 'Danh mục không tồn tại');
        }

        // Lọc sản phẩm theo danh mục
         $products = ProductModel::where('category', $categoryName)->get();
        return view('products.category', compact('products', 'categoryName'));
    }
    public function promotion()
{
    // Lấy tất cả sản phẩm có discount > 0
    $products = ProductModel::where('discount', '>', 0)->get();

    // Trả về view promotion.blade.php
    return view('products.promotion', compact('products'));
}

}
