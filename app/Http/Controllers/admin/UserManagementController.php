<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    public function index(){
        $user = UserModel::all();
        return view("admin.user_management",compact("user"));
    }
    public function show($id)
    {
        // Lấy user kèm luôn danh sách orders
        $user = UserModel::with('orders')->findOrFail($id);
        $orders = OrderModel::where('user_id', $id)
                    ->orderBy('created_at', 'desc')
                    ->paginate(8);
        return view('admin.user_management.show',compact('user','orders'));
    }
    public function edit($id)
    {
        $user = UserModel::findOrFail($id);
        return view('admin.user_management.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $user = UserModel::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'. $id . ',user_id',
            'password' => 'nullable|min:6',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Cập nhật thành công!');
    }
    public function destroy($id)
    {
        //bắt đầu transaction delecte
        DB::beginTransaction();
    
        try {
            //tìm user theo id của nó
            $user = UserModel::findOrFail($id);
            // ✅ Kiểm tra nếu là admin thì không cho xóa
            if ($user->role === 'admin') { 
                DB::rollBack();
                return redirect()->back()->with('error', 'Không thể xóa tài khoản quản trị viên!');
            }
    
            // Xóa chi tiết đơn hàng theo các đơn của user
            DB::table('order_details')
                ->whereIn('order_id', function ($query) use ($user) {
                    $query->select('id')->from('orders')->where('user_id', $user->user_id);
                })
                ->delete();
    
            // Xóa các đơn hàng
            DB::table('orders')->where('user_id', $user->user_id)->delete();
    
            // Cuối cùng xóa user
            $user->delete();
    
            DB::commit();
            return redirect()->back()->with('success', 'Xóa người dùng thành công!');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi xóa người dùng: ' . $e->getMessage());
        }
    }    
    public function create()
    {
        // Hiển thị form thêm người dùng
        return view('admin.create_user');
    }
    public function store(Request $request)
    {
        // Xác thực dữ liệu nhập
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ], [
            'name.required' => 'Vui lòng nhập tên người dùng!',
            'username.required' => 'Vui lòng nhập tên đăng nhập!',
            'email.required' => 'Vui lòng nhập email!',
            'email.unique' => 'Email này đã tồn tại!',
            'password.required' => 'Vui lòng nhập mật khẩu!',
        ]);

        try {
            DB::beginTransaction();
    
            $user = new UserModel();
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 'user'; 
            $user->save();
    
            DB::commit();
            return redirect()->route('edit_users')->with('success', 'Thêm người dùng thành công!');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi thêm người dùng: ' . $e->getMessage());
        }
    }
}
