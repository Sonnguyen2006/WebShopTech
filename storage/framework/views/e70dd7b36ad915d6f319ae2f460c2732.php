<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('resources/css/home.css')); ?>">
<!-- Content -->
<div class="container mt-4">
  <div class="row">

    <!-- SIDEBAR CATEGORY -->
    <div class="col-md-3">
      <div class="category-box shadow-sm">

        <div class="category-item">
          <a href="<?php echo e(route('category.show', 'dien-thoai')); ?>"
             class="<?php echo e(isset($categoryName) && $categoryName=='Điện thoại' ? 'active' : ''); ?>">
            <i class="bi bi-phone"></i> Điện thoại
          </a>
        </div>

        <div class="category-item">
          <a href="<?php echo e(route('category.show', 'laptop')); ?>"
             class="<?php echo e(isset($categoryName) && $categoryName=='Laptop' ? 'active' : ''); ?>">
            <i class="bi bi-laptop"></i> Laptop
          </a>
        </div>

        <div class="category-item">
          <a href="<?php echo e(route('category.show', 'tai-nghe')); ?>"
             class="<?php echo e(isset($categoryName) && $categoryName=='Tai nghe' ? 'active' : ''); ?>">
            <i class="bi bi-headphones"></i> Tai nghe
          </a>
        </div>

        <div class="category-item">
          <a href="<?php echo e(route('category.show', 'man-hinh')); ?>"
             class="<?php echo e(isset($categoryName) && $categoryName=='Màn hình' ? 'active' : ''); ?>">
            <i class="bi bi-display"></i> Màn hình
          </a>
        </div>

        <div class="category-item">
          <a href="<?php echo e(route('promotion')); ?>"
             class="<?php echo e(isset($categoryName) && $categoryName=='Khuyến mãi' ? 'active' : ''); ?>">
            <i class="bi bi-tag"></i> Khuyến mãi
          </a>
        </div>

      </div>
    </div>

    <!-- BANNER SLIDER -->
    <div class="col-md-9">
      <div class="banner-slider shadow-sm">
        <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">

          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="<?php echo e(asset('public/images/banner/1.png')); ?>" class="d-block w-100 banner-img" alt="banner">
            </div>

            <div class="carousel-item">
              <img src="<?php echo e(asset('public/images/banner/2.png')); ?>" class="d-block w-100 banner-img" alt="banner">
            </div>
          </div>

          <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon banner-control"></span>
          </button>

          <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon banner-control"></span>
          </button>

        </div>
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
              <?php $__currentLoopData = $products->where(fn($p, $i) => $i % 2 == 0); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
              $inStock = $product->branches->contains(fn($b) => $b->pivot->quantity > 0);
              ?>
              <div class="col-3">
                <div class="card h-100" onclick="window.location.href='<?php echo e(url('/product/' . $product->product_id)); ?>'" style="cursor:pointer;">
                  <img src="<?php echo e(asset('public/images/' . $product->product_image)); ?>" class="card-img-top" alt="<?php echo e($product->product_name); ?>">
                  <div class="card-body">
                    <h6 class="card-title"><?php echo e($product->product_name); ?></h6>
                    <p>
                      <?php if($product->discount > 0): ?>
                      <span class="badge bg-danger">Khuyến mãi <?php echo e($product->discount); ?>%</span>
                      <?php endif; ?>
                    </p>
                    <p class="fw-bold text-danger mb-0">
                      <?php if($product->discount > 0): ?>
                      <?php echo e(number_format($product->final_price, 0, ',', '.')); ?>₫
                      <span class="text-decoration-line-through text-muted ms-2"><?php echo e(number_format($product->product_cost, 0, ',', '.')); ?>₫</span>
                      <?php else: ?>
                      <?php echo e(number_format($product->product_cost, 0, ',', '.')); ?>₫
                      <?php endif; ?>
                    </p>
                    <div class="mt-2">
                      <?php if($inStock): ?>
                      <span class="badge bg-success">Còn hàng</span>
                      <?php else: ?>
                      <span class="badge bg-secondary d-block mx-auto">Hết hàng</span>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="row flex-nowrap transition mt-3" id="evenRow">
              <?php $__currentLoopData = $products->where(fn($p, $i) => $i % 2 == 1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php
              $inStock = $product->branches->contains(fn($b) => $b->pivot->quantity > 0);
              ?>
              <div class="col-3">
                <div class="card h-100" onclick="window.location.href='<?php echo e(url('/product/' . $product->product_id)); ?>'" style="cursor:pointer;">
                  <img src="<?php echo e(asset('public/images/' . $product->product_image)); ?>" class="card-img-top" alt="<?php echo e($product->product_name); ?>">
                  <div class="card-body">
                    <h6 class="card-title"><?php echo e($product->product_name); ?></h6>
                    <p>
                      <?php if($product->discount > 0): ?>
                      <span class="badge bg-danger">Khuyến mãi <?php echo e($product->discount); ?>%</span>
                      <?php endif; ?>
                    </p>
                    <p class="fw-bold text-danger mb-0">
                      <?php if($product->discount > 0): ?>
                      <?php echo e(number_format($product->final_price, 0, ',', '.')); ?>₫
                      <span class="text-decoration-line-through text-muted ms-2"><?php echo e(number_format($product->product_cost, 0, ',', '.')); ?>₫</span>
                      <?php else: ?>
                      <?php echo e(number_format($product->product_cost, 0, ',', '.')); ?>₫
                      <?php endif; ?>
                    </p>
                    <p class="mt-1">
                    <div class="mt-2">
                      <?php if($inStock): ?>
                      <span class="badge bg-success">Còn hàng</span>
                      <?php else: ?>
                      <span class="badge bg-secondary d-block mx-auto">Hết hàng</span>
                      <?php endif; ?>
                    </div>
                    </p>
                  </div>
                </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>


          
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
      <script src="<?php echo e(asset('resources/js/home.js')); ?>"></script>
      <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\WebShopTech\resources\views/home.blade.php ENDPATH**/ ?>