<?php $__env->startSection('content'); ?>
<div class="container my-5">
  <div class="row">
    <div class="col-md-5">
      <img src="<?php echo e(asset('public/images/' . $product->product_image)); ?>" 
           class="img-fluid rounded" 
           alt="<?php echo e($product->product_name); ?>">
    </div>
    <!-- Thông tin sản phẩm -->
    <div class="col-md-7">
      <h3 class="fw-bold"><?php echo e($product->product_name); ?></h3>

      <p class="text-muted mb-1">
        <strong>Danh mục:</strong> <?php echo e($product->category ?? 'Không xác định'); ?>

      </p>

      <?php if($product->rating): ?>
      <p class="mb-1">
        <strong>Đánh giá:</strong> ⭐ <?php echo e(number_format($product->rating, 1)); ?>/5
      </p>
      <?php endif; ?>

      <!-- Giá sản phẩm trong khung xanh biển -->
      <div class="border border-primary rounded p-3 my-3" 
           style="background-color: #e7f3ff; display: inline-block;">
        <span class="fw-bold text-primary" style="font-size: 1.4rem;">
          <?php echo e(number_format($product->final_price, 0, ',', '.')); ?>đ
        </span>
      </div>

      <!-- Mô tả -->
      <div class="mt-3">
        <h5 class="fw-semibold mb-2">Mô tả sản phẩm</h5>  
        <p class="text-secondary" style="white-space: pre-line;"><?php echo e($product->description); ?></p>
      </div>
      <form action="<?php echo e(route('cart.add', $product->product_id)); ?>" method="POST" class="mt-4">
        <?php echo csrf_field(); ?>
        <button type="submit" class="btn btn-danger btn-lg">
          <i class="fa fa-cart-plus"></i> Thêm vào giỏ hàng
        </button>
      </form>

      <a href="<?php echo e(url()->previous()); ?>" class="btn btn-outline-secondary mt-3">⬅ Quay lại</a>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\WebShopTech\resources\views/products/show.blade.php ENDPATH**/ ?>