@extends('layouts.master')
@section('content')
<link rel="stylesheet" href="{{ asset('resources/css/home.css') }}">

<!-- Content -->
<div class="container mt-3">
  <div class="row">
    <!-- Sidebar category -->
    <div class="col-md-3">
      <div class="category-menu shadow-sm">
        <div class="category-item"><a href="#"> Điện thoại</a></div>
        <div class="category-item"><a href="#"> Laptop</a></div>
        <div class="category-item"><a href="#"> Tai nghe</a></div>
        <div class="category-item"><a href="#"> Màn hình</a></div>
        <div class="category-item"><a href="#"> Khuyến mãi</a></div>
      </div>
    </div>

    <!-- Banner & Slider -->
    <div class="col-md-8">
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
    <div id="productCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="carousel-wrapper">
            <div class="row row-cols-1 row-cols-md-4 g-4" id="productContainer">
              @foreach($products as $product)
              <div class="col product-card">
                <div class="card h-100">
                  <img src="{{ asset('public/images/' . $product->product_image) }}" class="card-img-top" alt="{{ $product->product_name }}">
                  <div class="card-body">
                    <h5 class="card-title">{{ $product->product_name }}</h5>
                    <p class="text-muted">{{ Str::limit($product->description, 50) }}</p>
                    <p>⭐ {{ $product->rating }}</p>
                    <p class="fw-bold">{{ number_format($product->product_price, 0, ',', '.') }}₫</p>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>

      <!-- Nút điều hướng -->
      <button class="carousel-control-prev" type="button" id="prevBtn">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" id="nextBtn">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>
  </div>
</div>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('resources/js/home.js')}}"></script>
@endsection