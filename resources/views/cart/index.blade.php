@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="{{ asset('resources/css/cart.css') }}?v={{ time() }}">

<div class="container mt-4 mb-5">

    <h2 class="fw-bold mb-4">🛒 Giỏ hàng của bạn</h2>

    @if(session('cart') && count(session('cart')) > 0)

    <div class="row g-4">

        {{-- LEFT: CART LIST --}}
        <div class="col-lg-8">

            <div class="card shadow-sm">
                <div class="card-body p-3">

                    <table class="table align-middle">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 35%">Sản phẩm</th>
                                <th class="text-center">Ảnh</th>
                                <th class="text-center">Giá</th>
                                <th class="text-center">SL</th>
                                <th class="text-center">Tổng</th>
                                <th class="text-center">Xóa</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php $total = 0; @endphp

                            @foreach(session('cart') as $id => $product)
                                @php $total += $product['product_cost'] * $product['quantity']; @endphp

                                <tr>
                                    <td>
                                        <strong>{{ $product['product_name'] }}</strong>
                                        <br>
                                        <small class="text-muted">Mã SP: {{ $id }}</small>
                                    </td>

                                    <td class="text-center">
                                        <img src="{{ asset('public/images/' . $product['product_image']) }}"
                                             width="70" height="70"
                                             class="rounded"
                                             style="object-fit: cover;">
                                    </td>

                                    <td class="text-danger fw-bold text-center">
                                        {{ number_format($product['product_cost']) }}₫
                                    </td>

                                    <td class="text-center">
                                        <span class="badge bg-primary p-2">
                                            {{ $product['quantity'] }}
                                        </span>
                                    </td>

                                    <td class="fw-bold text-success text-center">
                                        {{ number_format($product['product_cost'] * $product['quantity'], 0, ',', '.') }}₫
                                    </td>

                                    <td class="text-center">
                                        <form action="{{ route('cart.remove') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $id }}">
                                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        {{-- RIGHT: TOTAL PRICE + CHECKOUT --}}
        <div class="col-lg-4">

            <div class="card shadow-sm">
                <div class="card-body">

                    <h4 class="fw-bold mb-3">Tóm tắt đơn hàng</h4>

                    <div class="d-flex justify-content-between mb-2">
                        <span>Tạm tính</span>
                        <span class="fw-bold">{{ number_format($total) }}₫</span>
                    </div>

                    <div class="d-flex justify-content-between mb-2">
                        <span>Phí vận chuyển</span>
                        <span class="fw-bold text-success">Miễn phí</span>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between mb-3">
                        <strong>Tổng cộng</strong>
                        <strong class="text-danger fs-4">{{ number_format($total) }}₫</strong>
                    </div>

                    <button id="showCheckoutForm" class="btn btn-danger w-100 py-2 fw-bold">
                        Thanh Toán
                    </button>

                </div>
            </div>

        </div>

    </div>

    {{-- MODAL CHECKOUT --}}
    <div id="checkoutModal" class="modal">
        <div class="modal-content shadow">

            <span class="close">&times;</span>

            <h4 class="fw-bold mb-3">Xác Nhận Thanh Toán</h4>

            <p class="mb-2">
                Tổng tiền:
                <span class="fw-bold text-danger">{{ number_format($total) }}₫</span>
            </p>

            <form action="{{ route('cart.checkout') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Địa chỉ nhận hàng</label>
                    <input type="text" name="address" class="form-control" placeholder="VD: 123 Đường A, Quận B" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Phương thức thanh toán</label>
                    <select name="payment_method" class="form-select" required>
                        <option value="COD">Thanh toán khi nhận hàng (COD)</option>
                        <option value="Online">Thanh toán Online</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success w-100 py-2 fw-bold">
                    Xác Nhận Thanh Toán
                </button>
            </form>
        </div>
    </div>

    @else
        <div class="alert alert-info mt-4">Giỏ hàng đang trống.</div>
    @endif
</div>

<script src="{{ asset('resources/js/cart.js') }}?v={{ time() }}"></script>

@endsection
