<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head> 
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    {{-- Header --}}
    <header class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top px-3">
      <div class="container-fluid d-flex justify-content-between align-items-center">
        
        {{-- Nút menu --}}
        <button class="btn btn-outline-secondary d-lg-none" type="button">
          <i class="bi bi-list"></i>
        </button>
        <button class="btn btn-outline-secondary m-3" id="toggleSidebar">
  <svg xmlns="http://www.w3.org/2000/svg"
       width="24" height="24"
       viewBox="0 0 24 24"
       fill="none"
       stroke="currentColor"
       stroke-width="2"
       stroke-linecap="round"
       stroke-linejoin="round"
       class="tabler-icon tabler-icon-menu">
    <path d="M4 8l16 0"></path>
    <path d="M4 16l16 0"></path>
  </svg>
</button>
@include('layouts.admin.sidebar')
        {{-- Logo hoặc tên --}}
        <a class="navbar-brand fw-bold text-primary" stylehref="#" style="padding-right: 2500px;">Modernize Admin</a>

       
    </header>

    {{-- Nội dung trang con --}}
    <main class="p-4">
        @yield('content')
    </main>

</div>

{{-- JS Bootstrap --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
