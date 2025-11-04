  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('resources/css/admin/home.css')}}">
</head>
<body>
    {{-- HEADER --}}
    <header class="shadow-sm">
        <button class="btn btn-outline-secondary" id="toggleSidebar" title="hide/display sidebar">
            <i class="bi bi-list"></i>
        </button>
        <a class="navbar-brand fw-bold text-primary" href="#">Modernize Admin</a>
    </header>

    {{-- MAIN (Sidebar + Content) --}}
    <div class="main-wrapper d-flex" id="mainWrapper">
        {{-- Sidebar --}}
        @include('layouts.admin.sidebar')

        {{-- Content --}}
        <div class="content" id="contentArea">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('resources/js/admin/home.js')}}"></script>
</body>
</html>
