<?php
namespace App\classes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\systems;
class create_system_1_class
{
    public function __construct()
    {
    }
    public function create_system($data)
    {
        $name = $data[count($data) -1 ];

        $id = Auth::id();
        $sys = new systems();
        $sys->system_name = $name;
        $sys->manger_id   = $id;
        $sys->save();

        $new_data = $this->get_full_data($data);
        //new data 2d array like this [[item , name] , [..] , ]
        $create = "CREATE TABLE system_" .$id . " (";
        for($i = 0 ;$i< count($new_data);$i++)
        {
            $mini_data =  $new_data[$i];
            $create .= $mini_data[0];
            if($mini_data[1] == "name")
            {
                $create .= " varchar(250) NUll ,";
            }
            else if($mini_data[1] == "number")
            {
                $create .= " INT(11) NULL ,";
            }
        }
        $create .= "item_add_time TIME ,";
        $create .= "item_add_date DATE";
        $create .=" )";
        DB::statement($create);
        return "lol";
        
    }
    private function get_full_data($values_check_array)
    {
        /*
            $values_check_array will be 1d array like this [item_id , item , ...]
            this function will return 2d array have all varibles that request content

        */
        $all_data =[
            ["item","name"] , 
            ["item_id" , "number"] , 
            ["item_number","number"] ,
            ["item_type" , "name"],
            ["item_price" , "number"],
            ["item_seller" , "name"],
            ["item_notes" , "name"],
            ["item_buyer" , "name"],
            ["item_buyer_phone" , "name"]
         ]; 
        $data = array();
        $data_counter = 0;
        for($i=0;$i<count($values_check_array)-1 ; $i++)
        {
            for($j=0;$j<count($all_data);$j++)
            {
                $mini_data = $all_data[$j];
                if($mini_data[0] == $values_check_array[$i])
                {
                    $data[$data_counter] = [$values_check_array[$i] , $mini_data[1]];
                    $data_counter++;
                }    
            }
            
        }
        return $data;
    }
}