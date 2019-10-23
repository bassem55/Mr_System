<?php
namespace App\classes;

use Illuminate\Support\Facades\DB;
    class edit_system_class
    {
        public function get_old_data($id)
        {
            $old_data = DB::table("system_info_" . $id)->get();
            $items = array();
            $items_counter = 0;

            $item_types = array();
            $item_types_counter = 0;

            $item_selller_names = array();
            $item_seller_names_counter = 0;

            foreach($old_data as $mini_data)
            {
                if(isset($mini_data->items) == true)
                {
                    if($mini_data->items != "")
                    {
                        $items[$items_counter] = $mini_data->items;
                        $items_counter++;
                    }
                }
                if(isset($mini_data->item_types) == true)
                {
                    if($mini_data->item_types != "")
                    {
                        $item_types[$item_types_counter] = $mini_data->item_types;
                        $item_types_counter++;
                    }
                }
                if(isset($mini_data->item_seller_names) == true)
                {
                    if($mini_data->item_seller_names != "")
                    {
                        $item_selller_names[$item_seller_names_counter] = $mini_data->item_seller_names;
                        $item_seller_names_counter++;
                    }
                }
            }
            $all_data = array();
            $all_data_counter = 0;
            if($items_counter > 0)
            {
                $all_data[$all_data_counter] = ["items" , $items];
                $all_data_counter++;
            }
            if($item_types_counter > 0)
            {
                $all_data[$all_data_counter] = ["item_types" , $item_types];
                $all_data_counter++;
            }
            if($item_seller_names_counter > 0)
            {
                $all_data[$all_data_counter] = ["item_seller_names" , $item_selller_names];
                $all_data_counter++;
            }
            return $all_data;
        }
        public function get_all_data($id)
        {
            $data = $this->get_old_data($id);
            
            $items_data = ""; 
            $item_types_data = "";
            $item_seller_names_data = "";
            for($i=0;$i<count($data);$i++)
            {
                $mini_data = $data[$i];
                if($mini_data[0] == "items")
                {
                    $items = $mini_data[1];
                    for($j=0;$j<count($items);$j++)
                    {
                        $onclick_value = 'onclick="remove_item(\'' . $j . '\')"';
                        $items_data .= "<div class='selected_item'>".$items[$j]."</div>";
                        $items_data .= '<input type="button" class="sp-btn remove_selected_btn" value="Remove" '.$onclick_value.'><br>';
                    }
                }
                else if($mini_data[0] == "item_types")
                {
                    $item_types = $mini_data[1];
                    for($j=0;$j<count($item_types);$j++)
                    {
                        $onclick_value = 'onclick="remove_type(\'' . $j . '\')"';
                        $item_types_data .= "<div class='selected_item'>".$item_types[$j]."</div>";
                        $item_types_data .= '<input type="button" class="sp-btn remove_selected_btn" value="Remove" '.$onclick_value.'><br>';
                    }
                }
                else if($mini_data[0] == "item_seller_names")
                {
                    $item_seller_names = $mini_data[1];
                    for($j=0;$j<count($item_seller_names);$j++)
                    {
                        $onclick_value = 'onclick="remove_seller(\'' . $j . '\')"';
                        $item_seller_names_data .= "<div class='selected_item'>".$item_seller_names[$j]."</div>";
                        $item_seller_names_data .= '<input type="button" class="sp-btn remove_selected_btn" value="Remove" '.$onclick_value.'><br>';
                    }
                }
            }
            $all_data = array();
            $all_data_counter = 0;
            if($items_data != "")
            {
                $all_data[$all_data_counter] = ["items_data" , $items_data];
                $all_data_counter++;
                $all_data[$all_data_counter] = ["items_array" , $items];
                $all_data_counter++;
            }
            if($item_types_data != "")
            {
                $all_data[$all_data_counter] = ["item_types_data" , $item_types_data];
                $all_data_counter++;
                $all_data[$all_data_counter] = ["item_types_array" , $item_types];
                $all_data_counter++;
            }
            if($item_seller_names_data != "")
            {
                $all_data[$all_data_counter] = ["item_seller_names_data" , $item_seller_names_data];
                $all_data_counter++;
                $all_data[$all_data_counter] = ["item_seller_names_array" , $item_seller_names];
                $all_data_counter++;
            }
            
            return $all_data;

        }
        public function edit_system($id , $data)
        {
            //first we will delete all data in table system_info_id
            DB::table("system_info_" . $id)->delete();

            //secand insert new data
            $insert_arr = array();
            $insert_arr_counter = 0;
            
            $insert = "";
            
            for($i=0;$i<count($data);$i++)
            {
                $mini_data = $data[$i];
                $data_name = $mini_data[0];
                $data_content = $mini_data[1];
     
                $insert = "INSERT INTO system_info_" . $id . "(" . $data_name . ") VALUES " ;
                for($j=0;$j<count($data_content);$j++)
                {
                    if($j == count($data_content) -1 )
                        $insert .= "('".$data_content[$j]."' );";
                    else
                        $insert .= "('".$data_content[$j]."' ) , ";
                }
                $insert_arr[$insert_arr_counter] = $insert;
                $insert_arr_counter++;
                    
                $insert = "";
            }
           
            for($i=0;$i<count($insert_arr);$i++)
            {
                DB::statement($insert_arr[$i]);
            }
            return "lol";
        }
    }
?>
