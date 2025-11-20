@extends('layouts.admin.master')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Chi tiết người dùng</h2>

    <!-- Thông tin người dùng -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-primary text-white"><strong>Thông tin cá nhân</strong></div>
        <div class="card-body">
            <table class="table table-borderless text-center table-sm">
                <thead class="table-light">
                    <tr>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Ngày tạo tài khoản</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('d/m/Y') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Danh sách đơn hàng -->
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white"><strong>Đơn hàng của người dùng</strong></div>
        <div class="card-body">
            @if($orders->count() > 0)
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Mã đơn</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Ngày đặt</th>
                            <th>Phương thức thanh toán</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->order_id }}</td>
                                <td>{{ number_format($order->total_amount, 0, ',', '.') }}₫</td>
                                <td>{{ ucfirst($order->status) }}</td>
                                <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                <td>{{ $order->payment_method }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Phân trang chỉ khi tổng đơn > 10 --}}
                @if($orders->total() > 10)
                    <div class="d-flex justify-content-center">
                        {{ $orders->links('pagination.custom') }}
                    </div>
                @endif
            @else
                <p>Người dùng này chưa có đơn hàng nào.</p>
            @endif
        </div>
    </div>
</div>
@endsection
