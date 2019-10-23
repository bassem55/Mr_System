<?php
namespace App\classes;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

use App\systems;
class my_system_class
{
    public function __construct()
    {
    }
    public function get_page_data($id)
    {
        $data =  DB::table("system_info_" . $id)->get();

        $all_data = array();
        $all_data_counter = 0;

        $items ="";
        $item_types = "";
        $item_seller_names = "";

        foreach ($data as $mini_data) 
        {
            if(Schema::hasColumn("system_info_" . $id ,"items"))
            {
                if($mini_data->items != "")
                {
                    $items .= "<option>".$mini_data->items . "</option>";
                }
            }
            if(Schema::hasColumn("system_info_" . $id ,"item_types"))
            {
                if($mini_data->item_types != "")
                {
                    $item_types .= "<option>" . $mini_data->item_types . "</option>";
                }
            }
            if(Schema::hasColumn("system_info_" . $id ,"item_seller_names"))
            {
                if($mini_data->item_seller_names != "")
                {
                    $item_seller_names .= "<option>" . $mini_data->item_seller_names . "</option>";
                }
            }
        }
        if($items != "")
        {
            $all_data[$all_data_counter] = [ "items" ,$items];
            $all_data_counter++;
        }
        if($item_types != "")
        {
            $all_data[$all_data_counter] = ["item_types" , $item_types];
            $all_data_counter++;
        }
        if($item_seller_names != "")
        {
            $all_data[$all_data_counter] = ["item_seller_names" , $item_seller_names];
            $all_data_counter++;
        }
        return $all_data;
    }
    public function add_new_data($data , $id)
    {
        //$data will be like ==> [["item_id" , "1"] , ["item_number" , "5"] , ["item" , "pantlon"] , ...];
            $insert = "INSERT INTO system_" . $id ;
            $insert_1 = " (";
            $insert_2 = " VALUES(";

            for($i=0;$i<count($data);$i++)
            {
                $mini_data = $data[$i];
                if($i != count($data)-1)
                {
                    $insert_1 .= $mini_data[0] . " , ";
                    $insert_2 .= "'" . $mini_data[1] ."' ,";
                }
                else
                {
                    $insert_1 .= $mini_data[0] . " )";
                    $insert_2 .= "'" . $mini_data[1] ."')";
                }
                
            }
            $insert .= $insert_1 . $insert_2;

            DB::statement($insert);
            return "lol";
    }
    public function get_data($id)
    {
        $date  = date('Y-m-d');
        $data =  DB::table("system_" . $id)->where("item_add_date" , $date)->get();

        $item_id = array();
        $item_number = array();
        $item = array();
        $item_type = array();
        $item_price = array();
        $item_buyer = array();
        $item_buyer_phone = array();
        $item_seller = array();
        $item_notes = array();
        $item_date = array();
        $item_time = array();
        $counter = 0;

        foreach($data as $mini_data)
        {
            if(isset($mini_data->item_id) == true)
            {
                $item_id[$counter] = $mini_data->item_id;
            }
            if(isset($mini_data->item_number) == true)
            {
                $item_number[$counter] = $mini_data->item_number;
            }
            if(isset($mini_data->item) == true)
            {
               $item[$counter] = $mini_data->item;
            }
            if(isset($mini_data->item_type) == true)
            {
                $item_type[$counter] = $mini_data->item_type;
            }
            if(isset($mini_data->item_price) == true)
            {
                $item_price[$counter] = $mini_data->item_price;
            }
            if(isset($mini_data->item_buyer) == true)
            {
                $item_buyer[$counter] = $mini_data->item_buyer;
            }
            if(isset($mini_data->item_buyer_phone) == true)
            {
                $item_buyer_phone[$counter] = $mini_data->item_buyer_phone;
            }
            if(isset($mini_data->item_seller) == true)
            {
                $item_seller[$counter] = $mini_data->item_seller;
            }
            if(isset($mini_data->item_notes) == true)
            {
                $item_notes[$counter] = $mini_data->item_notes;
            }
           
            $item_date[$counter] = $mini_data->item_add_date;
            $item_time[$counter] = $mini_data->item_add_time;
            
            $counter++;
        }
        $all_data = array();
        $all_data_counter = 0;
        if($this->system_have($id , "item_id") === true)
        {
            $all_data[$all_data_counter] = ["item_id" , $item_id];
            $all_data_counter++;
        }
        if($this->system_have($id , "item_number") === true)
        {
            $all_data[$all_data_counter] = ["item_number" , $item_number];
            $all_data_counter++;
        }
        if($this->system_have($id , "item") === true)
        {
            $all_data[$all_data_counter] = ["item" , $item];
            $all_data_counter++;
        }
        if($this->system_have($id , "item_type") === true)
        {
            $all_data[$all_data_counter] = ["item_type" , $item_type];
            $all_data_counter++;
        }
        if($this->system_have($id , "item_price") === true)
        {
            $all_data[$all_data_counter] = ["item_price" , $item_price];
            $all_data_counter++;
        }
        if($this->system_have($id , "item_buyer") === true)
        {
            $all_data[$all_data_counter] = ["item_buyer" , $item_buyer];
            $all_data_counter++;
        }
        if($this->system_have($id , "item_buyer_phone") === true)
        {
            $all_data[$all_data_counter] = ["item_buyer_phone" , $item_buyer_phone];
            $all_data_counter++;
        }
        if($this->system_have($id , "item_seller") === true)
        {
            $all_data[$all_data_counter] = ["item_seller" , $item_seller];
            $all_data_counter++;
        }
        if($this->system_have($id , "item_notes") === true)
        {
            $all_data[$all_data_counter] = ["item_notes" , $item_notes];
            $all_data_counter++;
        }
        $all_data[$all_data_counter] = ["item_add_date" ,$item_date];
        $all_data[$all_data_counter] = ["item_add_time" ,$item_time];
        return $all_data;
    }
    private function system_have($id , $thing)
    {
        $all_data =[
            "item_id" , 
            "item_number" , 
            "item" ,
            "item_type",
            "item_price",
            "item_buyer",
            "item_buyer_phone" ,
            "item_seller" ,
            "item_notes"
         ]; 
         for($i=0;$i<count($all_data);$i++)
         {
             if(Schema::hasColumn("system_" . $id,$all_data[$i]))
             {
                return true;
             }
         }
         return false;
    }
    public function what_system_have($id)
    {
        $all_data =[
            "item_id" , 
            "item_number" , 
            "item" ,
            "item_type",
            "item_price",
            "item_buyer",
            "item_buyer_phone" ,
            "item_seller" ,
            "item_notes"  ,
            "item_add_time"
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
    public function get_sys_name($id)
    {
        $data = systems::where('manger_id' , $id)->get();
        return $data[0]->system_name;
    }
}