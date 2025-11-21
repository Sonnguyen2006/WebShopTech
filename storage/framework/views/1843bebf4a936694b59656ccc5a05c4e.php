<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TechShop</title>
  <!-- CSS -->
  <link rel="stylesheet" href="<?php echo e(asset('resources/css/home.css')); ?>">
  <!-- Bootstrap + Icon -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


  <?php echo $__env->yieldContent('styles'); ?>
  <style>
      #search-input {
            border-radius: 10px 0 0 10px !important;
            padding-left: 15px !important;
        }

      .btn-search {
          border-radius: 0 10px 10px 0;
          font-weight: bold;
      }
  </style>  
</head>

<body>

  <!-- ===== NAVBAR ===== -->
  <nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
      <div class="container-fluid">

          <!-- Logo -->
          <a class="navbar-brand fw-bold text-white" href="<?php echo e(route('home')); ?>">
              TechShop
          </a>

          <!-- Responsive -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarNav">

              <!-- Search -->
              <form action="<?php echo e(route('products.search')); ?>" method="GET"
                    class="d-flex mx-auto position-relative" style="width: 420px;">
                  <input type="text" id="search-input" class="form-control"
                         name="keyword" placeholder="Bạn muốn mua gì hôm nay?">

                  <button class="btn btn-light btn-search" type="submit">Tìm</button>

                  <div id="suggestions-box"
                       class="list-group position-absolute w-100"
                       style="z-index: 2000; top:100%; left:0; max-height:300px; overflow-y:auto;">
                  </div>
              </form>

              <!-- Right Menu -->
              <ul class="navbar-nav ms-auto align-items-center">

                  <!-- Cart -->
                  <li class="nav-item me-3">
                      <a href="<?php echo e(route('cart.index')); ?>" class="nav-link text-white position-relative">
                          <i class="bi bi-cart3 fs-4"></i>
                          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning cart-badge">
                              <?php echo e(session('cart_count', 0)); ?>

                          </span>
                          Giỏ hàng
                      </a>
                  </li>

                  <!-- Login -->
                  <?php if(auth()->guard()->guest()): ?>
                      <li class="nav-item">
                          <a href="<?php echo e(route('login')); ?>" class="nav-link text-white">
                              <i class="bi bi-person-circle"></i> Đăng nhập
                          </a>
                      </li>
                  <?php else: ?>
                      <!-- User Dropdown -->
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown"
                             data-bs-toggle="dropdown">
                              <i class="bi bi-person-circle"></i> <?php echo e(Auth::user()->name); ?>

                          </a>

                          <ul class="dropdown-menu dropdown-menu-end shadow">
                              <li><a class="dropdown-item" href="<?php echo e(route('profile.show', Auth::user()->user_id)); ?>" style="color: blue !important;">Thông tin cá nhân</a></li>
                              <li><a class="dropdown-item" href="<?php echo e(route('order.index' , ['username' => Auth::user()->name])); ?>" style="color: blue !important;">Lịch sử mua hàng</a></li>

                              <li><hr class="dropdown-divider"></li>

                              <li>
                                  <a class="dropdown-item text-danger" href="<?php echo e(route('logout')); ?> " style="color: red !important;"
                                     onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                      Đăng xuất
                                  </a>
                              </li>

                              <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                  <?php echo csrf_field(); ?>
                              </form>
                          </ul>
                      </li>
                  <?php endif; ?>

              </ul>

          </div>
      </div>
  </nav>

  <!-- MAIN CONTENT -->
  <main class="py-4">
      <?php echo $__env->yieldContent('content'); ?>
  </main>

  <!-- FOOTER -->
  <footer class="border-top py-4">
      <div class="container text-center small">
          © <?php echo e(date('Y')); ?> TechShop. All rights reserved.
          <div class="mt-1">
              <a>Điều khoản</a> · <a>Quyền riêng tư</a>
          </div>
      </div>
  </footer>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
      window.searchUrl = "<?php echo e(route('search.suggestions')); ?>";
      window.productUrl = "<?php echo e(route('product.show', ['product_id' => 'PRODUCT_ID'])); ?>";
      window.imagesUrl = "<?php echo e(asset('public/images')); ?>";
  </script>

  <script src="<?php echo e(asset('resources/js/search_suggest.js')); ?>"></script>
</body>

</html>
<?php /**PATH D:\xampp\htdocs\WebShopTech\resources\views/layouts/master.blade.php ENDPATH**/ ?>