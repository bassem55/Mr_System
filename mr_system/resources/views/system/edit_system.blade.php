<html>
    <head>
        <title>Edit System</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('css/create_system_2.css') }}">
        <link rel="stylesheet" href="{{ asset('css/create_system_1.css') }}">
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript">
            all_data = <?php echo json_encode($data); ?> ;
            items = <?php echo json_encode($items_array); ?>;
            types = <?php echo json_encode($item_types_array); ?>;
            seller_names = <?php echo json_encode($item_seller_names_array); ?>;

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
                <div class="sub-div" id="items" style="display:block">
                    <?php echo $items; ?>
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
                <div class="sub-div" id="item_types" style="display:block">
                <?php echo $types; ?>
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
                <div class="sub-div" id="seller_names" style="display:block">   
                <?php echo $sellers; ?>
                </div>
                <div class="sub-div">
                    <input type="text" class="input" id="seller_name" placeholder="seller name">
                    <input type="button" class="sp-btn add_btn" id="add_seller_btn" value="Add new seller"><br>
                </div>
            </div>  
        </div>

        <input type="button" class="save_btn" value="Save">


        <div class="error" id="error">
                Error
        </div>
    </body>
    <script type="text/javascript" src="{{ asset('js/edit_system_1.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/edit_system_2.js')}}"></script>
</html>