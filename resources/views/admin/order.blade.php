@extends('layouts.admin.master')
@section('content')
@php
          $statusTexts = [
          'pending' => 'Chờ xử lý',
          'completed' => 'Hoàn thành',
          'cancelled' => 'Hủy'
          ];
          @endphp

<!-- Link Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="asset('resources/css/admin/order.css')">

<div class="container mt-4">
    <h1 class="mb-4">Danh sách tất cả đơn hàng</h1>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Người mua</th>
                <th>Email</th>
                <th>Tổng tiền</th>
                <th>Phương thước thanh toán</th>
                <th>Địa chỉ</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->name ?? 'Khách vãng lai' }}</td>
                <td>{{ $order->email }}</td>
                <td>{{ number_format($order->total_amount, 0, ',', '.') }}₫</td>
                <td>{{ $order->payment_method }}</td>
                <td>{{ $order->address }}</td>
                <td>
                    <div class="custom-select-wrapper w-100">
                        <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="dropdown w-100">
                                <button class="btn btn-light dropdown-toggle w-100 text-start" type="button" id="statusDropdown{{ $order->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ $statusTexts[$order->status] }}
                                </button>
                                <ul class="dropdown-menu w-100 rounded-bottom-2 shadow-sm" aria-labelledby="statusDropdown{{ $order->id }}">
                                    <li><button class="dropdown-item" type="submit" name="status" value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Chờ xử lý</button></li>
                                    <li><button class="dropdown-item" type="submit" name="status" value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Hoàn thành</button></li>
                                    <li><button class="dropdown-item" type="submit" name="status" value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Hủy</button></li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </td>


            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
