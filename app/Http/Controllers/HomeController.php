<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function home()
    {
        // Lấy tất cả sản phẩm
        $products = ProductModel::all();

        // Truyền ra view
        return view('home', compact('products'));
    }
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        // Tìm theo tên sản phẩm hoặc mô tả
        $products = ProductModel::where('product_name', 'LIKE', "%{$keyword}%")
                        ->get();

        return view('search_results', compact('products', 'keyword'));
    }
}