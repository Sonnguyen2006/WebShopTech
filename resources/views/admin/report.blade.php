@extends('layouts.admin.master')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">
    <h2 class="mb-4">Báo cáo theo ngày</h2>

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark">
                <tr class="text-center">
                    <th>Id</th>
                    <th>Người mua</th>
                    <th>Ngày</th>
                    <th>Tổng đơn hàng</th>
                    <th>Tổng doanh thu</th>
                    <th>Tổng sản phẩm bán ra</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ReportedDate as $day)
                    <tr class="text-center">
                        <td>{{ $day->user_id }}</td>
                        <td>{{ $day->username }}</td>
                        <td>{{ \Carbon\Carbon::parse($day->order_date)->format('d/m/Y') }}</td>
                        <td>{{ $day->total_orders }}</td>
                        <td>{{ number_format($day->total_revenue) }} VND</td>
                        <td>{{ $day->total_products }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
