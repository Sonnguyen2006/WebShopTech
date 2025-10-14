<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('resources/css/home.css')); ?>">

<!-- Content -->
<div class="container mt-3">
  <div class="row">
    <!-- Sidebar category -->
    <div class="col-md-3">
      <div class="category-menu shadow-sm">
        <div class="category-menu shadow-sm">

          <div class="category-item">
            <a href="<?php echo e(route('category.show', 'dien-thoai')); ?>" class="<?php echo e(isset($categoryName) && $categoryName=='Điện thoại' ? 'active' : ''); ?>">Điện thoại</a>
          </div>
          <div class="category-item">
            <a href="<?php echo e(route('category.show', 'laptop')); ?>" class="<?php echo e(isset($categoryName) && $categoryName=='Laptop' ? 'active' : ''); ?>">Laptop</a>
          </div>
          <div class="category-item">
            <a href="<?php echo e(route('category.show', 'tai-nghe')); ?>" class="<?php echo e(isset($categoryName) && $categoryName=='Tai nghe' ? 'active' : ''); ?>">Tai nghe</a>
          </div>
          <div class="category-item">
            <a href="<?php echo e(route('category.show', 'man-hinh')); ?>" class="<?php echo e(isset($categoryName) && $categoryName=='Màn hình' ? 'active' : ''); ?>">Màn hình</a>
          </div>
          <div class="category-item">
            <a href="<?php echo e(route('promotion')); ?>" class="<?php echo e(isset($categoryName) && $categoryName=='Khuyến mãi' ? 'active' : ''); ?>">Khuyến mãi</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Banner & Slider -->
    <div class="col-md-8">
      <!-- Carousel -->
      <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="<?php echo e(asset('public/images/banner/1.png')); ?>" class="d-block w-100" alt="banner">
          </div>
          <div class="carousel-item">
            <img src="<?php echo e(asset('public/images/banner/2.png')); ?>" class="d-block w-100" alt="banner">
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

        
        <div class="carousel-item active">
          <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php $__currentLoopData = $products->slice(0, 8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
            <div class="col">
              <div class="card h-100" onclick="window.location.href='<?php echo e(url('/product/' . $product->product_id)); ?>'" style="cursor:pointer;">
                <img src="<?php echo e(asset('public/images/' . $product->product_image)); ?>" class="card-img-top" alt="<?php echo e($product->product_name); ?>">
                <div class="card-body d-flex flex-column">
                  <h6 class="card-title"><?php echo e($product->product_name); ?></h6>
                  <p>
                    <?php if($product->discount > 0): ?>
                    <span class="badge bg-danger">Khuyến mãi <?php echo e($product->discount); ?>%</span>
                    <?php endif; ?>
                  </p>
                  <p class="fw-bold text-danger">
                    <?php if($product->discount > 0): ?>
                    <?php echo e(number_format($product->product_price * (1 - $product->discount/100), 0, ',', '.')); ?>₫
                    <span class="text-decoration-line-through text-muted"><?php echo e(number_format($product->product_price, 0, ',', '.')); ?>₫</span>
                    <?php else: ?>
                    <?php echo e(number_format($product->product_price, 0, ',', '.')); ?>₫
                    <?php endif; ?>
                  </p>
                </div>
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>

        
        <div class="carousel-item">
          <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php $__currentLoopData = $products->slice(8, 8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col">
              <div class="card h-100" onclick="window.location.href='<?php echo e(url('/product/' . $product->product_id)); ?>'" style="cursor:pointer;">
                <img src="<?php echo e(asset('public/images/' . $product->product_image)); ?>" class="card-img-top" alt="<?php echo e($product->product_name); ?>">
                <div class="card-body d-flex flex-column">
                  <h6 class="card-title"><?php echo e($product->product_name); ?></h6>
                  <p>
                    <?php if($product->discount > 0): ?>
                    <span class="badge bg-danger">Khuyến mãi <?php echo e($product->discount); ?>%</span>
                    <?php endif; ?>
                  </p>
                  <p class="fw-bold text-danger">
                    <?php if($product->discount > 0): ?>
                    <?php echo e(number_format($product->product_price * (1 - $product->discount/100), 0, ',', '.')); ?>₫
                    <span class="text-decoration-line-through text-muted"><?php echo e(number_format($product->product_price, 0, ',', '.')); ?>₫</span>
                    <?php else: ?>
                    <?php echo e(number_format($product->product_price, 0, ',', '.')); ?>₫
                    <?php endif; ?>
                  </p>
                </div>
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo e(asset('resources/js/home.js')); ?>"></script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\WebShopTech\resources\views/home.blade.php ENDPATH**/ ?>