@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<div class="container mt-4">
    <h3 class="mb-3">Chi tiết đơn hàng #{{ $order->id }}</h3>

    <div class="card mb-4">
        <div class="card-body">
            <p><strong>Ngày đặt:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
            <p><strong>Trạng thái:</strong>
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
            </p>
            <p><strong>Phương thức thanh toán:</strong> {{ $order->payment_method }}</p>
            <p><strong>Địa chỉ nhận hàng:</strong> {{ $order->address }}</p>
        </div>
    </div>

    <h5>Sản phẩm trong đơn</h5>
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Sản phẩm</th>
                    <th>Ảnh</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng</th>
                </tr>
            </thead>
            <tbody>
                @if($order->orderDetails && $order->orderDetails->count() > 0)
                @foreach($order->orderDetails as $item)
                <tr>
                    <td>{{ $item->product->product_name ?? 'Sản phẩm đã xóa' }}</td>
                    <td>
                    <img src="{{ $item->product ? asset('public/images/' . $item->product->product_image) : asset('images/no-image.png') }}"
                            width="70" height="70"
                            class="rounded"
                            style="object-fit: cover;">
                    </td>
                    <td>{{ number_format($item->product_cost, 0, ',', '.') }}₫</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->quantity * $item->product_cost, 0, ',', '.') }}₫</td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="4" class="text-center">Chưa có sản phẩm nào trong đơn hàng</td>
                </tr>
                @endif

            </tbody>
        </table>
    </div>

    <div class="text-end mt-3">
        <h5>Tổng đơn hàng: <span class="text-danger">{{ number_format($order->total_amount, 0, ',', '.') }}₫</span></h5>
    </div>

    <div class="mt-3">
        <a href="{{ route('order.index', ['username' => Auth::user()->name]) }}" class="btn btn-secondary">Quay lại lịch sử đơn hàng</a>
    </div>
</div>
@endsection