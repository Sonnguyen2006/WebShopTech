<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h2>Thêm sản phẩm mới</h2>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <form action="<?php echo e(route('create')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        
        <div class="mb-3">
            <label for="product_id" class="form-label">Mã sản phẩm</label>
            <input type="text" name="product_id" id="product_id" class="form-control" required value="<?php echo e(old('product_id')); ?>">
        </div>

        <div class="mb-3">
            <label for="product_name" class="form-label">Tên sản phẩm</label>
            <input type="text" name="product_name" id="product_name" class="form-control" required value="<?php echo e(old('product_name')); ?>">
        </div>

        <div class="mb-3">
            <label for="product_cost" class="form-label">Giá</label>
            <input type="number" name="product_cost" id="product_cost" class="form-control" required value="<?php echo e(old('product_cost')); ?>">
        </div>

        <div class='mb-3'>
            <label for="discount" class="form-label">Giảm giá (%)</label>
            <input type="number" name="discount" id="discount" class="form-control" value="<?php echo e(old('discount', 0)); ?>" min="0" max="100">

        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea name="description" id="description" class="form-control"><?php echo e(old('description')); ?></textarea>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Phân Loại</label>
           <select name="category" id="category" class="form-select" required>
            <option value="Laptop" <?php echo e(old('category') == 'Laptop' ? 'selected' : ''); ?>>Laptop</option>
            <option value="Điện thoại" <?php echo e(old('category') == 'Điện thoại' ? 'selected' : ''); ?>>Điện thoại</option>
            <option value="Tai nghe" <?php echo e(old('category') == 'Tai nghe' ? 'selected' : ''); ?>>Tai nghe</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="product_image" class="form-label">Ảnh sản phẩm</label>
            <input type="file" name="product_image" id="product_image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\WebShopTech\resources\views/admin/create.blade.php ENDPATH**/ ?>