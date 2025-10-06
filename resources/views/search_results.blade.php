@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="{{ asset('resources/css/home.css') }}">
<div class="container mt-4">
    <h4>Kết quả tìm kiếm cho: {{ $keyword }}</h4>

    <div class="row mt-3">
        @forelse($products as $product)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('public/images/' . $product->product_image) }}" class="card-img-top" alt="{{ $product->product_name }}">
                    <div class="card-body">
                        <h6 class="card-title">{{ $product->product_name }}</h6>
                        <p class="fw-bold text-danger">{{ number_format($product->product_price, 0, ',', '.') }}đ</p>
                    </div>
                </div>
            </div>
        @empty
            <p>Không tìm thấy sản phẩm nào.</p>
        @endforelse
    </div>
</div>
@endsection
