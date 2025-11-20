@extends('layouts.master')

@section('content')

@php
$inStock = $product->branches->contains(fn($b) => $b->pivot->quantity > 0);
@endphp

<div class="container my-4">

    <div class="row g-4">

        {{-- LEFT: IMAGE --}}
        <div class="col-lg-5">
            <div class="border rounded p-3 bg-white text-center">
                <img src="{{ asset('public/images/' . $product->product_image) }}"
                     alt="{{ $product->product_name }}"
                     class="img-fluid" style="max-height: 380px; object-fit: contain;">
            </div>
        </div>

        {{-- RIGHT: PRODUCT INFO --}}
        <div class="col-lg-7">

            <h3 class="fw-bold">{{ $product->product_name }}</h3>

            <p class="text-secondary mb-1">
                <strong>Danh mục:</strong> {{ $product->category ?? 'Không xác định' }}
            </p>

            @if($product->rating)
            <p class="mb-2">
                ⭐ <strong>{{ number_format($product->rating, 1) }}/5</strong>
            </p>
            @endif

            {{-- PRICE BOX --}}
            <div class="p-3 border rounded bg-light mt-3 mb-3">
                <h2 class="text-danger fw-bold mb-0">{{ number_format($product->final_price, 0, ',', '.') }}đ</h2>

                @if($product->discount > 0)
                <p class="mb-0 text-muted">
                    <small>Giá gốc: <s>{{ number_format($product->product_cost, 0, ',', '.') }}đ</s></small><br>
                    <small>Giảm {{ $product->discount }}%</small>
                </p>
                @endif
            </div>

            {{-- DESCRIPTION --}}
            <h5 class="fw-bold mt-4">Mô tả sản phẩm</h5>
            <p style="white-space: pre-line;" class="text-secondary">{{ $product->description }}</p>

            {{-- ADD TO CART --}}
            @if($inStock)
            <form action="{{ route('cart.add', $product->product_id) }}" method="POST" class="mt-4">
                @csrf
                <button type="submit" class="btn btn-danger btn-lg w-100 fw-bold">
                    <i class="fa fa-cart-plus"></i> Thêm vào giỏ hàng
                </button>
            </form>
            @else
            <button class="btn btn-secondary btn-lg w-100 mt-4" disabled>
                Hết hàng
            </button>
            @endif

        </div>
    </div>

    {{-- SPECIFICATIONS --}}
    @if($product->specification)
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="bg-white border rounded p-4">

                <h4 class="fw-bold mb-3">Thông số kỹ thuật</h4>

                <table class="table table-bordered">
                    <tr>
                        <th class="w-25">Màn hình</th>
                        <td>{{ $product->specification->screen ?? 'Đang cập nhật' }}</td>
                    </tr>
                    <tr>
                        <th>Kích thước</th>
                        <td>{{ $product->specification->size ?? 'Đang cập nhật' }}</td>
                    </tr>
                    <tr>
                        <th>Khối lượng</th>
                        <td>{{ $product->specification->weight ?? 'Đang cập nhật' }}</td>
                    </tr>
                    <tr>
                        <th>Tính năng</th>
                        <td>{{ $product->specification->features ?? 'Đang cập nhật' }}</td>
                    </tr>
                    <tr>
                        <th>Hệ điều hành</th>
                        <td>{{ $product->specification->os ?? 'Đang cập nhật' }}</td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
    @endif

</div>

@endsection
