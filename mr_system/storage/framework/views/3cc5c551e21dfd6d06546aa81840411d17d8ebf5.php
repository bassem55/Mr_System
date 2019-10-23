<?php $__env->startSection('title' , 'Mr System'); ?>
<style>
    .mid
    {
        
        text-align:center;
    }
    img
    {
        margin-top:100px;
        width:200px;
        height:200px;
        border-radius: 100px;
    }
</style>
<?php $__env->startSection('body'); ?>
    <div class="mid">
        <img src="<?php echo e(url('/photos/b.jpg')); ?>">
        <h1>This Website Created By Bassem Reda</h1>
        <h1>Gmail :: bassemreda55@gmail.com</h1>
        <h1>Phone :: +2 01202873616</h1>
    </div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.nav_bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laravel\smart_system\resources\views//about_us.blade.php ENDPATH**/ ?>