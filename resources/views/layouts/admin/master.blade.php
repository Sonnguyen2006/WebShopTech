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

       

       
    </header>

    {{-- MAIN (Sidebar + Content) --}}
    <div class="main-wrapper" id="mainWrapper">
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
