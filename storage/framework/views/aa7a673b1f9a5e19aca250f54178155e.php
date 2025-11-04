<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('resources/css/home.css')); ?>">
<div class="container mt-4">
    <h3 class="mb-3">Sản phẩm khuyến mãi</h3>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col">
            <div class="card h-100 border-danger" onclick="window.location.href='<?php echo e(url('/product/' . $product->product_id)); ?>'" style="cursor:pointer;"> 
                <img src="<?php echo e(asset('public/images/' . $product->product_image)); ?>" class="card-img-top" alt="<?php echo e($product->product_name); ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo e($product->product_name); ?></h5>
                    <p class="text-muted"><?php echo e(Str::limit($product->description, 50)); ?></p>
                    <p>
                        <?php if($product->discount > 0): ?>
                        <span class="badge bg-danger">Khuyến mãi <?php echo e($product->discount); ?>%</span>
                        <?php endif; ?>
                    </p>
                    <p class="fw-bold">
                        <?php if($product->discount > 0): ?>
                        <?php echo e(number_format($product->final_price, 0, ',', '.')); ?>₫
                        <span class="text-decoration-line-through text-muted"><?php echo e(number_format($product->product_cost, 0, ',', '.')); ?>₫</span>
                        <?php else: ?>
                        <?php echo e(number_format($product->product_cost, 0, ',', '.')); ?>₫
                        <?php endif; ?>  
                    </p>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\WebShopTech\resources\views/products/promotion.blade.php ENDPATH**/ ?>