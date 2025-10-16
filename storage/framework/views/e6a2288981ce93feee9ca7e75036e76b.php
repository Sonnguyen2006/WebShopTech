<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h3 class="mb-3">Lịch sử mua hàng của bạn</h3>

    <?php if($orders->isEmpty()): ?>
        <div class="alert alert-info">Bạn chưa có đơn hàng nào.</div>
    <?php else: ?>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Ngày đặt</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>#<?php echo e($order->id); ?></td>
                    <td><?php echo e($order->created_at->format('d/m/Y H:i')); ?></td>
                    <td><?php echo e(number_format($order->total_amount, 0, ',', '.')); ?>₫</td>
                    <td>
                        <?php switch($order->status):
                            case ('pending'): ?>
                                <span class="badge bg-warning text-dark">Chờ xử lý</span>
                                <?php break; ?>
                            <?php case ('completed'): ?>
                                <span class="badge bg-success">Hoàn thành</span>
                                <?php break; ?>
                            <?php case ('cancelled'): ?>
                                <span class="badge bg-danger">Đã hủy</span>
                                <?php break; ?>
                            <?php default: ?>
                                <span class="badge bg-secondary">Không xác định</span>
                        <?php endswitch; ?>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\WebShopTech\resources\views/orders/index.blade.php ENDPATH**/ ?>