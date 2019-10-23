<?php 
        $items = "";
        $item_types = "";
        $item_seller_names = "";

        
        for($i=0;$i<count($data);$i++)
        {
            $mini_data = $data[$i];
            if($mini_data[0] == "items")
            {
                $items = $mini_data[1];
            }
            else if($mini_data[0] == "item_types")
            {
                $item_types = $mini_data[1];
            }
            else if($mini_data[0] == "item_seller_names")
            {
                $item_seller_names = $mini_data[1];
            }
            
        }
?>

<?php $__env->startSection("title" , "My System"); ?>
<?php $__env->startSection("style"); ?>
    <link rel="stylesheet"  href="<?php echo e(asset('css/my_system.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection("head_script"); ?>
    <script type="text/javascript">
        system_attr = <?php echo json_encode($all_data); ?>;
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
    <div class="sys_name"><?php echo e($sys_name); ?></div>
    <div class="all_system">
            <div class="system">
                <div class="system_attrs">
                    <div class="system_attr item_id_attr">Id <br> of  <br> Item</div>
                    <div class="system_attr item_number_attr">Number <br> of <br> Pieces</div>
                    <div class="system_attr item_attr"><br>Item<br><br></div>
                    <div class="system_attr item_type_attr">Type <br> of  <br> Item</div>
                    <div class="system_attr item_price_attr"><br>price<br><br></div>
                    <div class="system_attr item_buyer_attr">buyer<br><br> name</div>
                    <div class="system_attr item_buyer_phone_attr">buyer<br>Phone<br> Number</div>
                    <div class="system_attr item_seller_attr">seller<br><br> name</div>
                    <div class="system_attr item_notes_attr"><br>notes<br><br></div>
                    <div class="system_attr item_add_time_attr"><br>Time<br><br></div>
                </div>
                <div class="old_data" id="old_data"></div>
            </div>
            <div class="inputs_div">
                <input type="number" class="inputs item_id_attr" id="item_id" placeholder="ID">
                <input type="number" class="inputs item_number_attr" id="item_number" placeholder="Nubmer of piece">
                <select class="inputs item_attr" id="item">
                        <?php 
                            echo $items;
                        ?>
                </select>
                <select class="inputs item_type_attr" id="item_type">
                        <?php 
                            echo $item_types;
                        ?>
                </select>
                <input type="number"   class="inputs item_price_attr" id="item_price" placeholder="Item price">
                <input type="text"   class="inputs item_buyer_attr" id="item_buyer"  placeholder="Buyer Name">
                <input type="text" class="inputs item_buyer_phone_attr" id="item_buyer_phone" placeholder="Buyer Phone">
                <select class="inputs item_seller_attr" id="item_seller">
                    <?php 
                        echo $item_seller_names;
                    ?>
                </select>
                <input type="text"   class="inputs item_notes_attr" id="item_notes" placeholder="Notes">
                <br>
                <input type="button" class="btn" id="save_btn" value="Add">
            </div>
    </div>
    <div id="result">

    </div> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/my_system_1.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/my_system_2.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.nav_bar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laravel\smart_system\resources\views/system/my_system.blade.php ENDPATH**/ ?>