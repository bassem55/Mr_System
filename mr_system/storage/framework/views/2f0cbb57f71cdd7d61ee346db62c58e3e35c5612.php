<html>
    <head>
        <title><?php echo $__env->yieldContent('title'); ?></title>
        <link rel="stylesheet" href="<?php echo e(asset('css/nav_bar.css')); ?>">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <?php echo $__env->yieldContent('style'); ?>
        <?php echo $__env->yieldContent('head_script'); ?>
    </head>
    <body>
        <?php if(Route::has('login')): ?>
        <div class="nav_bar">
            <div class="nav_attr logo right_1">Mr System</div>
            <?php if(auth()->guard()->check()): ?>
            <a class="nav_attr about_us left_4" href="<?php echo e(url('/about_us')); ?>">About Us</a>
            <a class="nav_attr contact_us left_3" href="<?php echo e(url('/contact_us')); ?>">Contact Us</a>
            <a class="nav_attr my_system left_2" href="<?php echo e(url('/my_system')); ?>">My System</a>
            <a class="nav_attr home left_1" href="<?php echo e(url('/home')); ?>">Home</a>
            <?php else: ?>
            <a href="<?php echo e(route('login')); ?>">Login</a>
            <?php if(Route::has('register')): ?>
            <a href="<?php echo e(route('register')); ?>">Register</a>
            <?php endif; ?>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('body'); ?>
    </body>
    <?php echo $__env->yieldContent('script'); ?>
</html>

<?php /**PATH F:\laravel\smart_system\resources\views/layouts/nav_bar.blade.php ENDPATH**/ ?>