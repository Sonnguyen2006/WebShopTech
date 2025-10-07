<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechShop</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('resources/css/master.css') }}">
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <div class="container-fluid">
    <!-- Logo -->
    <a class="navbar-brand fw-bold text-white" href="{{ route('home') }}">
      TechShop
    </a>

    <!-- Button responsive -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Nội dung navbar -->
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
      <!-- Form search (ra giữa) -->
      <form action="{{route ('products.search')}}" method="get" class="d-flex me-4" style="width: 400px;">
        <input class="form-control me-2" type="search" name="keyword" placeholder="Bạn muốn mua gì hôm nay?">
        <button class="btn btn-light" type="submit">Tìm</button>
      </form>

      <!-- Menu Giỏ hàng & Đăng nhập -->
      <ul class="navbar-nav align-items-center">
        <!-- Giỏ hàng -->
        <li class="nav-item me-3">
          <a href="{{route('cart.index')}}" class="nav-link text-white position-relative">
            <i class="fa fa-shopping-cart fa-lg"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning">
              {{ session('cart_count', 0) }}
            </span>
            Giỏ hàng
          </a>
        </li>

        <!-- Đăng nhập -->
        @guest
          <li class="nav-item">
            <a href="#" class="nav-link text-white">
              <i class="fa fa-user"></i> Đăng nhập
            </a>
          </li>
        @else
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
              <i class="fa fa-user-circle"></i> {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-end">
              <a class="dropdown-item" href="{{ route('profile') }}">Thông tin cá nhân</a>
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                 Đăng xuất
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </div>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
<main class="py-4">
    @yield('content') 
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<footer class="bg-light border-top py-4 mt-auto">
    <div class="container text-center small">
        &copy; {{ date('Y') }} Cellphones. All rights reserved.
        <div>
            <a>Điều khoản</a> · <a >Quyền riêng tư</a>
        </div>
    </div>
</footer>