<aside id="sidebar" class="sidebar bg-white text-black p-3">
  <div class="logo mb-4">
    <a href="/" class="text-black text-decoration-none">
      <img src="{{ asset('public/images/logo/Copilot_20251007_105042.png') }}" alt="Logo">

    </a>
  </div>

  <h6 class="mt-4 mb-2">Home</h6>
  <ul class="list-unstyled">
    <li><a href="{{ route('admin.report') }}"><i class="fa fa-home me-2"></i> Dashboard</a></li>
  </ul>

  <h6 class="text-uppercase mt-4 mb-2">Function</h6>
  <ul class="list-unstyled">
    <li><a href="{{ route('create') }}" class="text-black d-block py-2"><i class="fa fa-font me-2"></i> Create Product</a></li>
    <li><a href="{{route('order')}}" class="text-black d-block py-2"><i class="fa fa-clone me-2"></i> Product Management</a></li>
    <li><a href="{{route('edit_users')}}" class="text-black d-block py-2"><i class="fa fa-clone me-2"></i> Users Management</a></li>
  </ul>

  <h6 class="text-uppercase mt-4 mb-2">Auth</h6>
  <ul class="list-unstyled">
    <li><a href="#" class="text-black d-block py-2"><i class="fa fa-sign-in me-2"></i> Logout</a></li>
  </ul>
</aside>