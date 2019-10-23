<html>
    <head>
        <title>Create System</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('css/system_attr.css')); ?>">
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    </head>
    <body>
        <div class="mini-title">Plaese Enter The System Name</div>
        <div class="system_name">
            <input type="text" id="sys_name" placeholder="System Name">
        </div>
        <div class="mini-title">Please Select The Attributes You Want It In Your System</div>
        <div class="all_attr">
            <div class="attr" id="item" onclick="add('item')">the item you will sell it</div>
            <div class="attr" id="item_id" onclick="add('item_id')">the id of item you sell it</div>
            <div class="attr" id="item_number" onclick="add('item_number')">the number of peaces of selling item</div>
            <div class="attr" id="item_type" onclick="add('item_type')">the type of the item</div>
            <div class="attr" id="item_price" onclick="add('item_price')">the price of item</div>
            <div class="attr" id="item_seller" onclick="add('item_seller')">the seller name</div>
            <div class="attr" id="item_notes" onclick="add('item_notes')">the notes</div>
            <div class="attr" id="item_buyer" onclick="add('item_buyer')">the buyer name</div>
            <div class="attr" id="item_buyer_phone" onclick="add('item_buyer_phone')">the buyer phone number</div>
        </div>
        <div class="mini-title">System Attributes</div>
        <div class="all_sel_attr" id="all_sel_attr"></div>
            
        <input type="button" value="Create System" class="btn" id="btn">
    </body>
    <script type="text/javascript" src="<?php echo e(asset('js/system_attr.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/ajax.js')); ?>"></script>
</html><?php /**PATH F:\laravel\smart_system\resources\views/system/system_attr.blade.php ENDPATH**/ ?>