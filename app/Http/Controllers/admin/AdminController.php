<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function admin(){
        $topUsers = UserModel::select(
            'users.user_id',
            'users.name',
            DB::raw('SUM(CAST(orders.total_amount AS SIGNED)) as total_spent')
        )
        ->join('orders', 'orders.user_id', '=', 'users.user_id')
        ->groupBy('users.user_id', 'users.name')
        ->orderByDesc('total_spent')
        ->limit(5)
        ->get();
    return view('admin.home', compact('topUsers'));
}

    public function getRevenue()
    {
        $revenues = DB::table('orders')
            ->selectRaw('DATE(created_at) as date, SUM(total_amount) as total')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return response()->json($revenues);
    }
    public function logout()
{
    Auth::logout(); // dùng guard mặc định
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect()->route('home'); // hoặc route login bình thường
}
}
