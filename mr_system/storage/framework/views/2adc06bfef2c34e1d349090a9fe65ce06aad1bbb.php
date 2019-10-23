<html>
    <head>
        <title>Edit System</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('css/create_system_2.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('css/create_system_1.css')); ?>">
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript">
            all_data = <?php echo json_encode($data); ?> ;
        </script>
    </head>
    <body>
        <div class="all_attr">
            <?php
                for($i=0;$i<count($data);$i++)
                {
                    $new_data ="<div class='attr' id='".$data[$i]."' >".$data[$i]."</div>"; 
                    echo $new_data;
                }
            ?>
        </div>
        <div id="gen_item">
            <div class="mini-title">Item</div>
            <div class="all_attr">
                <div class="mini-title">Please Enter All Items In Your System </div>
                <div class="sub-div" id="items">
                
                </div>
                <div class="sub-div">
                    <input type="text" class="input" id="item_value" placeholder="Item">
                    <input type="button" class="sp-btn add_btn" id="add_item_btn" value="Add New Item">
                </div>
            </div>
       </div>


       <div id="gen_item_type">
            <div class="mini-title">Item Types</div>
            <div class="all_attr">
                <div class="mini-title">Please Enter All Types of Items In Your System </div>
                <div class="sub-div" id="item_types">
                
                </div>
                <div class="sub-div">
                    <input type="text" class="input" id="item_type_value" placeholder="Item type">
                    <input type="button" class="sp-btn add_btn" id="add_type_btn" value="Add New Type">
                </div>
            </div>
       </div>

       
        <div id="gen_item_seller">
            <div class="mini-title">Item Seller Names</div>
            <div class="all_attr">
                <div class="mini-title">Please enter all seller names in your system</div>
                <div class="sub-div" id="seller_names">   
                </div>
                <div class="sub-div">
                    <input type="text" class="input" id="seller_name" placeholder="seller name">
                    <input type="button" class="sp-btn add_btn" id="add_seller_btn" value="Add new seller"><br>
                </div>
            </div>  
        </div>

        <input type="button" class="save_btn" value="Save" onclick = "save()">


        <div class="error" id="error">
                Error
        </div>
    </body>
    <script type="text/javascript" src="<?php echo e(asset('js/create_system_2_1.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/create_system_2_2.js')); ?>"></script>
</html><?php /**PATH F:\laravel\smart_system\resources\views/system/create_system_2.blade.php ENDPATH**/ ?>