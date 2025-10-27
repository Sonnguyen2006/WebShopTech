<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('resources/css/cart.css')); ?>?v=<?php echo e(time()); ?>">
<div class="container mt-5">
    <h2>Giỏ hàng của bạn</h2>
    <?php if(session('cart') && count(session('cart')) > 0): ?>
    <table class="table">
        <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Ảnh</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php $total = 0; ?>
            <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $total += $product['product_price'] * $product['quantity']; ?>
            <tr>
                <td><?php echo e($product['product_name']); ?></td>
                <td><img src="<?php echo e(asset('public/images/' . $product['product_image'])); ?>" width="60"></td>
                <td><?php echo e(number_format($product['product_price'])); ?>₫</td>
                <td> <?php echo e(number_format($product['quantity'])); ?></td>
                <td><?php echo e(number_format($product['product_price'] * $product['quantity'], 0, ',', '.')); ?>₫</td>
                <td>
                    <form action="<?php echo e(route('cart.remove')); ?>" method="POST" style="display:inline-block;">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" value="<?php echo e($id); ?>">
                        <button type="submit" class="btn-remove">Xóa</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
        </tbody>
    </table>
    <div class="bill"> <h4>Tổng cộng: <?php echo e(number_format($total)); ?>₫</h4>
    <div class="bill mt-4">
            <!-- Nút hiển thị form -->
            <!-- Nút mở modal -->
<button id="showCheckoutForm" class="btn btn-primary mt-2">Thanh Toán</button>

<!-- Modal -->
<div id="checkoutModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h4>Thanh Toán</h4>
        <p><strong>Tổng tiền: </strong><?php echo e(number_format($total)); ?>₫</p>

        <form action="<?php echo e(route('cart.checkout')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label>Địa chỉ nhận hàng:</label>
                <input type="text" name="address" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Phương thức thanh toán:</label>
                <select name="payment_method" class="form-control" required>
                    <option value="COD">Thanh toán khi nhận hàng (COD)</option>
                    <option value="Online">Thanh toán Online</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success mt-2">Xác Nhận Thanh Toán</button>
        </form>
    </div>
</div>

</div>
    <?php else: ?>
    <p>Giỏ hàng đang trống.</p>
    <?php endif; ?>
</div>
<script src="<?php echo e(asset('resources/js/cart.js')); ?>?v=<?php echo e(time()); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\WebShopTech\resources\views/cart/index.blade.php ENDPATH**/ ?>