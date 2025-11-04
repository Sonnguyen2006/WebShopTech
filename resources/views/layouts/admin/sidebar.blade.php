<aside id="sidebar" class="sidebar bg-white text-black p-3">
            <div class="logo mb-4">
                <a href="/" class="text-black text-decoration-none">
                    <img src="/images/logos/dark-logo.svg" alt="Logo">
                </a>
            </div>

            <h6 class="mt-4 mb-2">Home</h6>
            <ul class="list-unstyled">
                <li><a href="#"><i class="fa fa-home me-2"></i> Dashboard</a></li>
            </ul>

            <h6 class="mt-4 mb-2">Product</h6>
            <ul class="list-unstyled">
                <li><a href="#"><i class="fa fa-font me-2"></i> Create products</a></li>
                <li><a href="#"><i class="fa fa-clone me-2"></i> Edit products</a></li>
            </ul>

<<<<<<< HEAD
            <h6 class="mt-4 mb-2">Sales</h6>
            <ul class="list-unstyled">
                <li><a href="#"><i class="fa fa-sign-in me-2"></i> Login</a></li>
                <li><a href="#"><i class="fa fa-user-plus me-2"></i> Register</a></li>
            </ul>
        </aside>
=======
  <h6 class="text-uppercase mt-4 mb-2">Home</h6>
  <ul class="list-unstyled">
    <li><a href="/dashboard" class="text-black d-block py-2"><i class="fa fa-home me-2"></i> Dashboard</a></li>
  </ul>

  <h6 class="text-uppercase mt-4 mb-2">Function</h6>
  <ul class="list-unstyled">
    <li><a href="{{ route('create') }}" class="text-black d-block py-2"><i class="fa fa-font me-2"></i> Create Product</a></li>
    <li><a href="/utilities/shadow" class="text-black d-block py-2"><i class="fa fa-clone me-2"></i> Product Management</a></li>
  </ul>

  <h6 class="text-uppercase mt-4 mb-2">Auth</h6>
  <ul class="list-unstyled">
    <li><a href="/authentication/login" class="text-black d-block py-2"><i class="fa fa-sign-in me-2"></i> Login</a></li>
    <li><a href="/authentication/register" class="text-black d-block py-2"><i class="fa fa-user-plus me-2"></i> Register</a></li>
  </ul>
</aside>

<!-- Overlay mờ nền -->
<div id="overlay" 
     style="position:fixed; top:0; left:0; width:100%; height:100%; 
            background:rgba(0,0,0,0.4); display:none; z-index:1040;">
</div>

<!-- JS toggle -->
<script>
  const toggleBtn = document.getElementById('toggleSidebar');
  const sidebar = document.getElementById('sidebar');
  const overlay = document.getElementById('overlay');

  // Mở/đóng sidebar khi bấm nút
  toggleBtn.addEventListener('click', (e) => {
    e.stopPropagation(); // không lan click ra ngoài
    const isOpen = sidebar.style.transform === 'translateX(0%)';
    sidebar.style.transform = isOpen ? 'translateX(-100%)' : 'translateX(0%)';
    overlay.style.display = isOpen ? 'none' : 'block';
  });

  // Ẩn sidebar khi click ra ngoài (overlay)
  overlay.addEventListener('click', () => {
    sidebar.style.transform = 'translateX(-100%)';
    overlay.style.display = 'none';
  });

  // Nếu click vào bất kỳ đâu ngoài sidebar và nút menu → ẩn sidebar
  document.addEventListener('click', (e) => {
    if (!sidebar.contains(e.target) && e.target !== toggleBtn) {
      sidebar.style.transform = 'translateX(-100%)';
      overlay.style.display = 'none';
    }
  });
</script>
>>>>>>> e018151e0a7ee06cb35a8b221f997dfd7cef1cac
