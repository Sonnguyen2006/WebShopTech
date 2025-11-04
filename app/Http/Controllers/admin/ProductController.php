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
            'rating'=>'nullable|integer|min:1|max:5',

        ]);
          $imageName = null;
    if ($request->hasFile('product_image')) {
        $image = $request->file('product_image');
        // tạo tên file duy nhất
        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        // chuyển vào thư mục public/image
        $image->move(public_path('images'), $imageName);
    }
        ProductModel::create([
            'product_id'=>$request->product_id,
            'product_name'=>$request->product_name,
            'product_cost'=>$request->product_cost,
            'discount'=>$request->discount,
            'description'=>$request->description,
            'category'=>$request->category,
            'product_image'=>$imageName,
            'rating'=>$request->rating,

        ]);
        return redirect('/admin')->with('success','Thêm sản phẩm thành công!');
    }
    public function show($product_id){
        $product = ProductModel::where('product_id', $product_id)->firstOrFail();
        return view('products.show', compact('product'));
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
        //nếu không có categoryName nào thì trả về rổng
        if (!$categoryName) {
            abort(404, 'Danh mục không tồn tại');
        }

        // Lọc sản phẩm theo danh mục
         $products = ProductModel::where('category', $categoryName)->get();
         //lọc theo categoryName
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


