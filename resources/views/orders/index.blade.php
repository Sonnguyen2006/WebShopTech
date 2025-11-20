@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<div class="container mt-4">
    <h3 class="mb-3">Lịch sử mua hàng của bạn</h3>

    @if($orders->isEmpty())
        <div class="alert alert-info">Bạn chưa có đơn hàng nào.</div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                        <td>{{ number_format($order->total_amount, 0, ',', '.') }}₫</td>
                        <td>
                            @switch($order->status)
                                @case('pending')
                                    <span class="badge bg-warning text-dark">Chờ xử lý</span>
                                    @break
                                @case('completed')
                                    <span class="badge bg-success">Hoàn thành</span>
                                    @break
                                @case('cancelled')
                                    <span class="badge bg-danger">Đã hủy</span>
                                    @break
                                @default
                                    <span class="badge bg-secondary">Không xác định</span>
                            @endswitch
                        </td>
                        <td>
                        <a href="{{ route('order.show', ['username' => $order->username, 'order_id' => $order->order_id]) }}" class="btn btn-sm btn-primary">
                            Xem chi tiết
                        </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
