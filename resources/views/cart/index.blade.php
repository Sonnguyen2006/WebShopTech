@extends('layouts.master')
@section('content')
<link rel="stylesheet" href="{{asset('resources/css/cart.css')}}">
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

<style>
/* Modal nền + blur + fade */
.modal {
    display: none;
    position: fixed;
    z-index: 999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    backdrop-filter: blur(5px); /* blur background */
    background-color: rgba(0,0,0,0.3);
    transition: opacity 0.3s ease;
    opacity: 0;
}

/* Khi active, modal hiển thị */
.modal.show {
    display: block;
    opacity: 1;
}

/* Modal content scale + slide */
.modal-content {
    background-color: #fff;
    border-radius: 8px;
    width: 50%;
    max-width: 600px;
    margin: 10% auto;
    padding: 20px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    transform: scale(0.8);
    transition: transform 0.3s ease, opacity 0.3s ease;
    opacity: 0;
}

/* Khi modal hiển thị, content scale lên */
.modal.show .modal-content {
    transform: scale(1);
    opacity: 1;
}

/* Nút đóng */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}
.close:hover { color: #000; }
</style>

<script>
const modal = document.getElementById('checkoutModal');
const btn = document.getElementById('showCheckoutForm');
const close = modal.querySelector('.close');

btn.addEventListener('click', () => {
    modal.classList.add('show');
});

close.addEventListener('click', () => {
    modal.classList.remove('show');
});

// Click ngoài modal để đóng
window.addEventListener('click', (event) => {
    if(event.target == modal) {
        modal.classList.remove('show');
    }
});
</script>
</div>
    @else
    <p>Giỏ hàng đang trống.</p>
    @endif
</div>

@endsection