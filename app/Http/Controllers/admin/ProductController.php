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
   public function index()
    {
        $products = ProductModel::latest()->get(); // lấy theo thời gian tạo gần nhất
        return view('admin.ProductManagement', compact('products'));
    }
    public function edit($product_id)
    {
        $products = ProductModel::where('product_id', $product_id)->firstOrFail();
        return view('admin.product.ProductManagementEdit', compact('products'));
    }

    // Xác nhận sản phẩm (bật trạng thái active)
public function update(Request $request, $product_id)
    {
        $request->validate([
            'product_name'=>'required|string|max:255',
            'product_cost'=>'required|numeric',
            'discount'=>'required|numeric',
            'description'=>'required|string',
            'category'=>'required|string',
            'product_image'=>'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $products = ProductModel::findOrFail($product_id);

        // Xử lý ảnh nếu có
        if ($request->hasFile('product_image')) {
            // Xóa ảnh cũ nếu có
            if ($products->product_image && file_exists(public_path('images/'.$products->product_image))) {
                unlink(public_path('images/'.$products->product_image));
            }

            $image = $request->file('product_image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $products->product_image = $imageName;
        }

        // Cập nhật thông tin sản phẩm
        $products->update([
            'product_name'=>$request->product_name,
            'product_cost'=>$request->product_cost,
            'discount'=>$request->discount,
            'description'=>$request->description,
            'category'=>$request->category,
        ]);

        return redirect()->route('admin.ProductManagement')
                         ->with('success', 'Cập nhật sản phẩm thành công!');
    }

    // Xóa sản phẩm
    public function destroy($product_id)
    {
        $product = ProductModel::findOrFail($product_id);

        // Xóa ảnh nếu có
        if ($product->product_image && file_exists(public_path('images/'.$product->product_image))) {
            unlink(public_path('images/'.$product->product_image));
        }

        $product->delete();
        return redirect()->route('admin.ProductManagement')
                         ->with('success', 'Xóa sản phẩm thành công!');
    }
    
}



