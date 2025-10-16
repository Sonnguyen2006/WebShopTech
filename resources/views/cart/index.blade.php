@extends('layouts.master')
@section('content')
<link rel="stylesheet" href="{{ asset('resources/css/cart.css') }}?v={{ time() }}">
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
                <th>Hành Động</th>
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
                <td>
                    <form action="{{ route('cart.remove') }}" method="POST" style="display:inline-block;">
                        @csrf
                        <input type="hidden" name="id" value="{{ $id }}">
                        <button type="submit" class="btn-remove">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
    <div class="bill"> <h4>Tổng cộng: {{ number_format($total) }}₫</h4>
    <div class="bill mt-4">
            <!-- Nút hiển thị form -->
            <!-- Nút mở modal -->
<button id="showCheckoutForm" class="btn btn-primary mt-2">Thanh Toán</button>

<!-- Modal -->
<div id="checkoutModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h4>Thanh Toán</h4>
        <p><strong>Tổng tiền: </strong>{{ number_format($total) }}₫</p>

        <form action="" method="POST">
            @csrf
            <div class="mb-3">
                <label>Địa chỉ nhận hàng:</label>
                <input type="text" name="address" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Phương thức thanh toán:</label>
                <select name="payment_method" class="form-control" required>
                    <option value="COD">Thanh toán khi nhận hàng (COD)</option>
                    <option value="Online">Thanh toán Online</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success mt-2">Xác Nhận Thanh Toán</button>
        </form>
    </div>
</div>

</div>
    @else
    <p>Giỏ hàng đang trống.</p>
    @endif
</div>
<script src="{{ asset('resources/js/cart.js') }}?v={{ time() }}"></script>
@endsection