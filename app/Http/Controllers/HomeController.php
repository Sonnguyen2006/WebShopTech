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
}
