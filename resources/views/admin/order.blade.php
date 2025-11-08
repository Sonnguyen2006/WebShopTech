@extends('layouts.admin.master')

@section('content')
<!-- Link Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">
    <h1 class="mb-4">Danh sách tất cả đơn hàng</h1>

    @if(session('success'))
        <p class="text-success">{{ session('success') }}</p>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Người mua</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->name ?? 'Khách vãng lai' }}</td>
                <td>{{ number_format($order->total_amount, 0, ',', '.') }}₫</td>
                <td>{{ $order->status }}</td>
                <td>
                    <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST" class="d-flex align-items-center gap-2">
                        @csrf
                        @method('PATCH')
                        <select name="status" class="form-select form-select-sm w-auto">
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Chờ xử lý</option>
                            <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Hoàn thành</option>
                            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Hủy</option>
                        </select>
                        <button type="submit" class="btn btn-primary btn-sm">Cập nhật</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
