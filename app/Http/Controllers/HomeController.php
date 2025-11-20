<?php

namespace App\Http\Controllers;

use App\Models\BranchModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function home()
    {
        // Lấy tất cả sản phẩm
        $products = ProductModel::query()
            ->orderByDesc('discount')   // ưu tiên discount lớn
            ->orderByDesc('rating')     // nếu discount bằng nhau thì ưu tiên rating cao
            ->take(10)                  // chỉ lấy 10 sản phẩm
            ->get();
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
     // AJAX gợi ý autocomplete
      // AJAX gợi ý autocomplete
      public function suggestions(Request $request)
      {
          $query = $request->get('query');
          if (!$query) return response()->json([]);
      
          $products = ProductModel::where('product_name', 'LIKE', "%{$query}%")
              ->take(5)
              ->get(['product_id','product_name','product_cost','product_image','discount']);
      
          $products->map(function($p){
              $p->final_price = $p->discount > 0 ? $p->product_cost - ($p->product_cost * $p->discount / 100) : $p->product_cost;
          });
      
          return response()->json($products);
      }
}      
