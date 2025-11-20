@extends('layouts.master')
@section('content')
<link rel="stylesheet" href="{{ asset('resources/css/home.css') }}">
<div class="container mt-4">
    <h3 class="mb-3">Sản phẩm khuyến mãi</h3>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach($products as $product)
        @php
        $inStock = $product->branches->contains(fn($b) => $b->pivot->quantity > 0);
        @endphp
        <div class="col">
            <div class="card h-100 border-danger" onclick="window.location.href='{{ url('/product/' . $product->product_id) }}'" style="cursor:pointer;"> {{-- viền đỏ cho sản phẩm khuyến mãi --}}
                <img src="{{ asset('public/images/' . $product->product_image) }}" class="card-img-top" alt="{{ $product->product_name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->product_name }}</h5>
                    <p class="text-muted">{{ Str::limit($product->description, 50) }}</p>
                    <p>
                        @if($product->discount > 0)
                        <span class="badge bg-danger">Khuyến mãi {{ $product->discount }}%</span>
                        @endif
                    </p>
                    <p class="fw-bold">
                        @if($product->discount > 0)
                        {{ number_format($product->final_price, 0, ',', '.') }}₫
                        <span class="text-decoration-line-through text-muted">{{ number_format($product->product_cost, 0, ',', '.') }}₫</span>
                        @else
                        {{ number_format($product->product_cost, 0, ',', '.') }}₫
                        @endif
                    </p>
                    <div class="mt-2">
                        @if($inStock)
                        <span class="badge bg-success">Còn hàng</span>
                        @else
                        <span class="badge bg-secondary d-block mx-auto">Hết hàng</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection