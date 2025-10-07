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
}
