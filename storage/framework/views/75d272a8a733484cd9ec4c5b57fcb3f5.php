<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $__env->yieldContent('title', 'Admin Dashboard'); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('resources/css/admin/home.css')); ?>">
</head>
<body>
    
    <header class="shadow-sm">
        <button class="btn btn-outline-secondary" id="toggleSidebar" title="hide/display sidebar">
            <i class="bi bi-list"></i>
        </button>
        <a class="navbar-brand fw-bold text-primary" href="#">Modernize Admin</a>
    </header>

    
    <div class="main-wrapper" id="mainWrapper">
        
        <?php echo $__env->make('layouts.admin.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        
        <div class="content" id="contentArea">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo e(asset('resources/js/admin/home.js')); ?>"></script>
</body>
</html>
<?php /**PATH D:\xampp\htdocs\WebShopTech\resources\views/layouts/admin/master.blade.php ENDPATH**/ ?>