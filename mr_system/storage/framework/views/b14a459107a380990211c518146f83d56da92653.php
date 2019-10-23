<?php $__env->startSection('title' , 'Home'); ?>
<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('/css/home.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>   
    <div class="options">
        <div class="option" id="option_1" onmouseover="hover('option_1')" onmouseout="out('option_1')" onclick=go_to("<?php echo e(url('/my_system')); ?>")>
            Your System
        </div>
        <div class="option" id="option_2" onmouseover="hover('option_2')" onmouseout="out('option_2')" onclick=go_to("<?php echo e(url('/sales')); ?>")>
            Sales
        </div>
        <br>
        <div class="option" id="option_3" onmouseover="hover('option_3')" onmouseout="out('option_3')" onclick=go_to("<?php echo e(url('/edit_system')); ?>")>
            Edit Your System
        </div>
        <div class="option" id="option_4" onmouseover="hover('option_4')" onmouseout="out('option_4')" onclick=go_to("<?php echo e(url('/create_system')); ?>")>
            Create System
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript" src="<?php echo e(asset('/js/home.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.nav_bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laravel\smart_system\resources\views/home.blade.php ENDPATH**/ ?>