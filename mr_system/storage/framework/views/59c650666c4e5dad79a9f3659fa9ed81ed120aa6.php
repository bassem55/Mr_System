<form method="post" action="<?php echo e(url('/system_attr')); ?>">
    <?php echo e(csrf_field()); ?>

    <input type="text" value="shop" name="system_name">
    <input type="text" value="item" name="item">
    <input type="text" value="item id" name="item_id">
    <input type="text" value="item number" name="item_number">
    <input type="submit" value="test">
</form><?php /**PATH F:\laravel\smart_system\resources\views/test.blade.php ENDPATH**/ ?>