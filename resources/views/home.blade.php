@extends('layouts.master')
@section('content')
<link rel="stylesheet" href="{{ asset('resources/css/home.css') }}">
<!-- Content -->
<div class="container mt-3">
  <div class="row">
    <!-- Sidebar category -->
    <div class="col-md-3">
      <div class="category-menu shadow-sm">
        <div class="category-menu shadow-sm">

          <div class="category-item">
            <a href="{{ route('category.show', 'dien-thoai') }}" class="{{ isset($categoryName) && $categoryName=='Điện thoại' ? 'active' : '' }}">Điện thoại</a>
          </div>
          <div class="category-item">
            <a href="{{ route('category.show', 'laptop') }}" class="{{ isset($categoryName) && $categoryName=='Laptop' ? 'active' : '' }}">Laptop</a>
          </div>
          <div class="category-item">
            <a href="{{ route('category.show', 'tai-nghe') }}" class="{{ isset($categoryName) && $categoryName=='Tai nghe' ? 'active' : '' }}">Tai nghe</a>
          </div>
          <div class="category-item">
            <a href="{{ route('category.show', 'man-hinh') }}" class="{{ isset($categoryName) && $categoryName=='Màn hình' ? 'active' : '' }}">Màn hình</a>
          </div>
          <div class="category-item">
            <a href="{{ route('promotion') }}" class="{{ isset($categoryName) && $categoryName=='Khuyến mãi' ? 'active' : '' }}">Khuyến mãi</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Banner & Slider -->
    <div class="col-md-9">
      <!-- Carousel -->
      <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{asset('public/images/banner/1.png')}}" class="d-block w-100" alt="banner">
          </div>
          <div class="carousel-item">
            <img src="{{asset('public/images/banner/2.png')}}" class="d-block w-100" alt="banner">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
      </div>
    </div>
  </div>
</div>
<div class="container main mt-4">
  <div class="row">
    <div id="productCarousel" class="carousel slide" data-bs-wrap="false">
      <div class="carousel-inner">
        <div class="container my-4 position-relative">
          <div class="product-slider overflow-hidden">
            <div class="row flex-nowrap transition" id="oddRow">
              @foreach($products->where(fn($p, $i) => $i % 2 == 0) as $product)
              @php
              $inStock = $product->branches->contains(fn($b) => $b->pivot->quantity > 0);
              @endphp
              <div class="col-3">
                <div class="card h-100" onclick="window.location.href='{{ url('/product/' . $product->product_id) }}'" style="cursor:pointer;">
                  <img src="{{ asset('public/images/' . $product->product_image) }}" class="card-img-top" alt="{{ $product->product_name }}">
                  <div class="card-body">
                    <h6 class="card-title">{{ $product->product_name }}</h6>
                    <p>
                      @if($product->discount > 0)
                      <span class="badge bg-danger">Khuyến mãi {{ $product->discount }}%</span>
                      @endif
                    </p>
                    <p class="fw-bold text-danger mb-0">
                      @if($product->discount > 0)
                      {{ number_format($product->final_price, 0, ',', '.') }}₫
                      <span class="text-decoration-line-through text-muted ms-2">{{ number_format($product->product_cost, 0, ',', '.') }}₫</span>
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

            <div class="row flex-nowrap transition mt-3" id="evenRow">
              @foreach($products->where(fn($p, $i) => $i % 2 == 1) as $product)
              @php
              $inStock = $product->branches->contains(fn($b) => $b->pivot->quantity > 0);
              @endphp
              <div class="col-3">
                <div class="card h-100" onclick="window.location.href='{{ url('/product/' . $product->product_id) }}'" style="cursor:pointer;">
                  <img src="{{ asset('public/images/' . $product->product_image) }}" class="card-img-top" alt="{{ $product->product_name }}">
                  <div class="card-body">
                    <h6 class="card-title">{{ $product->product_name }}</h6>
                    <p>
                      @if($product->discount > 0)
                      <span class="badge bg-danger">Khuyến mãi {{ $product->discount }}%</span>
                      @endif
                    </p>
                    <p class="fw-bold text-danger mb-0">
                      @if($product->discount > 0)
                      {{ number_format($product->final_price, 0, ',', '.') }}₫
                      <span class="text-decoration-line-through text-muted ms-2">{{ number_format($product->product_cost, 0, ',', '.') }}₫</span>
                      @else
                      {{ number_format($product->product_cost, 0, ',', '.') }}₫
                      @endif
                    </p>
                    <p class="mt-1">
                    <div class="mt-2">
                      @if($inStock)
                      <span class="badge bg-success">Còn hàng</span>
                      @else
                      <span class="badge bg-secondary d-block mx-auto">Hết hàng</span>
                      @endif
                    </div>
                    </p>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>


          {{-- Nút điều hướng --}}
          <!-- Prev -->
          <button class="carousel-control-prev" type="button" id="prevBtn">
            <span class="carousel-control-prev-icon"></span>
          </button>
          <button class="carousel-control-next" type="button" id="nextBtn">
            <span class="carousel-control-next-icon"></span>
          </button>
        </div>
      </div>



      <!-- Bootstrap JS -->
      <script src="{{ asset('resources/js/home.js') }}"></script>
      @endsection