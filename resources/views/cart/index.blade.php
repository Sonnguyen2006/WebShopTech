@extends('layouts.master')
@section('content')
<div class="container mt-5">
    <h2>Giỏ hàng của bạn</h2>
    @if(session('cart') && count(session('cart')) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Ảnh</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach(session('cart') as $id => $product)
                    @php $total += $product['product_price'] * $product['quantity']; @endphp
                    <tr>
                        <td>{{ $product['product_name'] }}</td>
                        <td><img src="{{ asset('public/images/' . $product['product_image']) }}" width="60"></td>
                        <td>{{ number_format($product['product_price']) }}₫</td>
                        <td> {{number_format($product['quantity'])}}</td>
                        <td>{{ number_format($product['product_price'] * $product['quantity']) }}₫</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h4>Tổng cộng: {{ number_format($total) }}₫</h4>
    @else
        <p>Giỏ hàng đang trống.</p>
    @endif
</div>
@endsection