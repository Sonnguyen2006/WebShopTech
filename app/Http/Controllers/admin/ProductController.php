<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function createform()
    {
        return view('admin.create');
    }
    public function create( Request $request){
        $request->validate([
            'product_id'=> 'required|unique:products,product_id',
            'product_name'=>'required|string|max:255',
            'product_cost'=>'required|numeric',
            'discount'=>'required|numeric',
            'description'=>'required|string',
            'category'=>'required|string',
            'product_image'=>'required|image|mimes:jpg,jpeg,png|max:2048',

        ]);
          $imageName = null;
    if ($request->hasFile('product_image')) {
        $image = $request->file('product_image');
        // tạo tên file duy nhất
        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        // chuyển vào thư mục public/image
        $image->move(public_path('image'), $imageName);
    }
        ProductModel::create([
            'product_id'=>$request->product_id,
            'product_name'=>$request->product_name,
            'product_cost'=>$request->product_cost,
            'discount'=>$request->discount,
            'description'=>$request->description,
            'category'=>$request->category,
            'product_image'=>$imageName
        ]);
        return redirect('/admin')->with('success','Thêm sản phẩm thành công!');
    }
}
