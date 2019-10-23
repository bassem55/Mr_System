<?php

namespace App\classes;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;

class create_system_2_class
{
    public function add_info_to_system($data)
    {
        $insert_arr = array();
        $insert_arr_counter = 0;
        
       
        $id = Auth::id();
        $create = "CREATE TABLE system_info_" . $id . "(";
        $col_create = "";

        $insert = "";
        
        for($i=0;$i<count($data);$i++)
        {
            $mini_data = $data[$i];
            $data_name = $mini_data[0];
            $data_content = $mini_data[1];

            if($i == count($data) -1 )
                $col_create .= $data_name . " varchar(100) NULL )";    
            else
                $col_create .= $data_name . " varchar(100) NULL ," ; 
                
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
        $create .= $col_create;
        DB::statement($create);

        for($i=0;$i<count($insert_arr);$i++)
        {
            DB::statement($insert_arr[$i]);
        }
        return "lol";
        
    }
    public function what_system_have()
    {
        $id = Auth::id();
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