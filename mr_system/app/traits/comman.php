<?php
namespace App\traits;
use Illuminate\Support\Facades\Schema;
use App\systems;
    trait comman
    {
        public function where_i_am($id)
        {
            //user  do not create system yet
            if(!Schema::hasTable('system_' . $id) && systems::where('manger_id' , $id)->count() == 0)
            {
                return "none";
            }
            else if(Schema::hasTable('system_' .$id ) && systems::where('manger_id' , $id)->count() != 0 && !Schema::hasTable('system_info_' . $id))
            {
                return "create_1";
            }
            else if(Schema::hasTable('system_' .$id ) && Schema::hasTable('system_info_' . $id) &&systems::where('manger_id' , $id)->count() != 0)
            {
                return "full";
            }
        }
        public function smart_index($id)
        {
            $output = $this->where_i_am($id);
            if($output == "none")
            {
                return redirect("/create_system");
            }
            else if($output == "create_1")
            {
                return redirect("/add_info");
            }
            else if($output == "full")
            {
                return redirect("/my_system");
            }
        }
        public function what_system_have($id)
        {
            $all_data =[
                "item" , 
                "item_id" , 
                "item_number" ,
                "item_type",
                "item_price",
                "item_seller",
                "item_notes" ,
                "item_buyer" ,
                "item_buyer_phone"
            ]; 

            $new_data = array();
            $new_data_counter = 0;
            for($i=0;$i<count($all_data);$i++)
            {
                if(Schema::hasColumn("system_" . $id,$all_data[$i]))
                {
                    $new_data[$new_data_counter] = $all_data[$i];
                    $new_data_counter++;
                }
            }
            return $new_data;

        }
    }
