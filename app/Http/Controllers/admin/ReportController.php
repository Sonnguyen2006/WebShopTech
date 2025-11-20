<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\OrderModel;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    //
public function report(){
$ReportedDate = OrderDetail::join('orders', 'orders.order_id', '=', 'order_details.order_id')
    ->select(
        DB::raw('DATE(orders.created_at) as order_date'),
        DB::raw('COUNT(DISTINCT orders.id) as total_orders'),
        DB::raw('SUM(orders.total_amount) as total_revenue'),
        DB::raw('SUM(order_details.quantity) as total_products')
    )
    ->groupBy('order_date')
    ->orderBy('order_date', 'desc')
    ->get();

    dump(OrderModel::count(), OrderDetail::count());

    return view('admin.report', compact('ReportedDate'));
        
}
}