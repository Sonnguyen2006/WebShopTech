@extends('layouts.master')

@section('content')
<div class="container mt-4">

    {{-- Thông tin cá nhân --}}
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">Thông tin cá nhân</div>
        <div class="card-body">
            <p><strong>Tên:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
        </div>
    </div>

    {{-- Lịch sử mua hàng --}}
    <div class="card">
        <div class="card-header bg-success text-white">Sản phẩm đã mua</div>
        <div class="card-body">

            @forelse($ordersByDate as $date => $orders)
            <h5 class="text-primary mt-3">Ngày {{ $date }}</h5>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    @foreach($order->orderDetails ?? [] as $item) {{-- chú ý dùng orderDetails --}}
                    <tr>
                        <td>{{ $item->product->product_name ?? 'Không có sản phẩm' }}</td>
                        <td>{{ $item->quantity ?? 0 }}</td>
                        <td>{{ number_format($item->price ?? 0) }}đ</td>
                    </tr>
                    @endforeach
                    @endforeach
                </tbody>
            </table>

            @empty
            <p class="text-muted">Chưa có đơn hàng nào.</p>
            @endforelse


        </div>
    </div>

</div>
@endsection