@extends('layouts.master')
@section('content')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div class="container mt-4">
    <h3 class="mb-3">Danh mục: {{ ucfirst($categoryName) }}</h3>

    <div class="row g-4">
        @foreach($products as $product)
        @php
            $inStock = $product->branches->contains(fn($b) => $b->pivot->quantity > 0);
        @endphp
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="product-card h-100" onclick="window.location.href='{{ url('/product/' . $product->product_id) }}'" style="cursor:pointer;">
                <img src="{{ asset('public/images/' . $product->product_image) }}" class="card-img-top" alt="{{ $product->product_name }}">
                <div class="card-body">
                    <h5 class="product-title">{{ $product->product_name }}</h5>
                    <p class="text-muted" style="font-size: 0.9rem;">{{ Str::limit($product->description, 50) }}</p>
                    <p class="mb-1">⭐ {{ $product->rating ?? '0' }}</p>
                    
                    @if($product->discount > 0)
                        <span class="badge bg-danger mb-1">Khuyến mãi {{ $product->discount }}%</span>
                    @endif
                    
                    <p class="fw-bold mb-1">
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
                            <span class="badge bg-secondary">Hết hàng</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
