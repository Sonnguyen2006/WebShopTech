@extends('layouts.admin.master')
@section('content')
<h2>Báo cáo theo ngày</h2>

<table border="1" cellpadding="5">
    <tr>
        <th>Ngày</th>
        <th>Tổng đơn hàng</th>
        <th>Tổng doanh thu</th>
        <th>Tổng sản phẩm bán ra</th>
    </tr>
    @foreach($ReportedDate as $day)
<tr>
    <td>{{ \Carbon\Carbon::parse($day->order_date)->format('d/m/Y') }}</td>
    <td>{{ $day->total_orders }}</td>
    <td>{{ number_format($day->total_revenue) }} VND</td>
    <td>{{ $day->total_products }}</td>
</tr>
@endforeach

</table>
@endsection
