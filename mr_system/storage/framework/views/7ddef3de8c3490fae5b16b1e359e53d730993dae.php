<?php $__env->startSection('content'); ?>
<form action="<?php echo e(url('/new_system')); ?>" method="post">
<?php echo e(csrf_field()); ?>

    <label>system name</label>
    <input typr="text" name="system_name">
    <input type="submit" value="Create New System">
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laravel\smart_system\resources\views/system/new_system.blade.php ENDPATH**/ ?>