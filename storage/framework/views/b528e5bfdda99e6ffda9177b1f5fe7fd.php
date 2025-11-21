<?php $__env->startSection('content'); ?>

<?php
$inStock = $product->branches->contains(fn($b) => $b->pivot->quantity > 0);
?>

<div class="container my-4">

    <div class="row g-4">

        
        <div class="col-lg-5">
            <div class="border rounded p-3 bg-white text-center">
                <img src="<?php echo e(asset('public/images/' . $product->product_image)); ?>"
                     alt="<?php echo e($product->product_name); ?>"
                     class="img-fluid" style="max-height: 380px; object-fit: contain;">
            </div>
        </div>

        
        <div class="col-lg-7">

            <h3 class="fw-bold"><?php echo e($product->product_name); ?></h3>

            <p class="text-secondary mb-1">
                <strong>Danh mục:</strong> <?php echo e($product->category ?? 'Không xác định'); ?>

            </p>

            <?php if($product->rating): ?>
            <p class="mb-2">
                ⭐ <strong><?php echo e(number_format($product->rating, 1)); ?>/5</strong>
            </p>
            <?php endif; ?>

            
            <div class="p-3 border rounded bg-light mt-3 mb-3">
                <h2 class="text-danger fw-bold mb-0"><?php echo e(number_format($product->final_price, 0, ',', '.')); ?>đ</h2>

                <?php if($product->discount > 0): ?>
                <p class="mb-0 text-muted">
                    <small>Giá gốc: <s><?php echo e(number_format($product->product_cost, 0, ',', '.')); ?>đ</s></small><br>
                    <small>Giảm <?php echo e($product->discount); ?>%</small>
                </p>
                <?php endif; ?>
            </div>

            
            <h5 class="fw-bold mt-4">Mô tả sản phẩm</h5>
            <p style="white-space: pre-line;" class="text-secondary"><?php echo e($product->description); ?></p>

            
            <?php if($inStock): ?>
            <form action="<?php echo e(route('cart.add', $product->product_id)); ?>" method="POST" class="mt-4">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn btn-danger btn-lg w-100 fw-bold">
                    <i class="fa fa-cart-plus"></i> Thêm vào giỏ hàng
                </button>
            </form>
            <?php else: ?>
            <button class="btn btn-secondary btn-lg w-100 mt-4" disabled>
                Hết hàng
            </button>
            <?php endif; ?>

        </div>
    </div>

    
    <?php if($product->specification): ?>
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="bg-white border rounded p-4">

                <h4 class="fw-bold mb-3">Thông số kỹ thuật</h4>

                <table class="table table-bordered">
                    <tr>
                        <th class="w-25">Màn hình</th>
                        <td><?php echo e($product->specification->screen ?? 'Đang cập nhật'); ?></td>
                    </tr>
                    <tr>
                        <th>Kích thước</th>
                        <td><?php echo e($product->specification->size ?? 'Đang cập nhật'); ?></td>
                    </tr>
                    <tr>
                        <th>Khối lượng</th>
                        <td><?php echo e($product->specification->weight ?? 'Đang cập nhật'); ?></td>
                    </tr>
                    <tr>
                        <th>Tính năng</th>
                        <td><?php echo e($product->specification->features ?? 'Đang cập nhật'); ?></td>
                    </tr>
                    <tr>
                        <th>Hệ điều hành</th>
                        <td><?php echo e($product->specification->os ?? 'Đang cập nhật'); ?></td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
    <?php endif; ?>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\WebShopTech\resources\views/products/show.blade.php ENDPATH**/ ?>