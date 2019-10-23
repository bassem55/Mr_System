<?php
namespace App\classes;
use Illuminate\Support\Facades\DB;
class sales_class
{
    public function sales_for_today($id)
    {
        $date  = date('Y-m-d');
        $data =  DB::table("system_" . $id)->where("item_add_date" , $date)->get();

        $sales = 0;
        foreach($data as $mini_data)
        {
            $sales += $mini_data->item_price;
        }
        return $sales;
    }
    public function sales_for_sp_day($day , $id)
    {
        $data = DB::table("system_" . $id)->where("item_add_date" , $day)->get();

        $sales = 0;
        foreach($data as $mini_data)
        {
            $sales += $mini_data->item_price;
        }
        return $sales;
    }
    public function sales_for_this_month($id)
    {
        $month =  date('m');

        $data = DB::table("system_" . $id)->get();

        $sales = 0;
        foreach($data as $mini_data)
        {
            $arr = explode("-" , $mini_data->item_add_date);
            if($month == $arr[1])
            {
                $sales += $mini_data->item_price;
            }
        }
        return $sales;
    }
    public function sales_for_sp_month($month , $year , $id)
    {
        $data = DB::table("system_" . $id)->get();

        $sales = 0;
        foreach($data as $mini_data)
        {
            $arr = explode("-" , $mini_data->item_add_date);
            if($month == $arr[1] && $year == $arr[0])
            {
                $sales += $mini_data->item_price;
            }
        }
        return $sales;
    }
    public function sales_for_this_year($id)
    {
        $year =  "20" .date('y');
        $data = DB::table("system_" . $id)->get();

        $sales = 0;
        foreach($data as $mini_data)
        {
            $arr = explode("-" , $mini_data->item_add_date);
            if($year == $arr[0])
            {
                $sales += $mini_data->item_price;
            }
        }
        return $sales;
    }
    public function sales_for_sp_year($year , $id)
    {
        $data = DB::table("system_" . $id)->get();

        $sales = 0;
        foreach($data as $mini_data)
        {
            $arr = explode("-" , $mini_data->item_add_date);
            if($year == $arr[0])
            {
                $sales += $mini_data->item_price;
            }
        }
        return $sales;
    }
    public function all_sales($id)
    {
        $data = DB::table("system_" . $id)->get();

        $sales = 0;
        foreach($data as $mini_data)
        {
            $sales += $mini_data->item_price;
        } 
        return $sales;
    }
    public function get_last_days($id)
    {
        $days = [];
        $days_counter = 0;
        $data = DB::table("system_" . $id)->get();

        foreach($data as $mini_data)
        {
            $date = $mini_data->item_add_date;
            $arr = explode("-" , $date);
            $d_m = $arr[2] . "-" . $arr[1];
            if($days_counter == 30)
                break;
            if($this->repeated($d_m , $days) === false)
            {
                $days[$days_counter] = $d_m;
                $days_counter++;
            }
        }
        return $days;
    }
    private function repeated($thing , $array)
    {
        for($i=0;$i<count($thing);$i++)
        {
            if($thing == $array[$i])
                return true;
        }
        return false;
    }
    public function sales_for_seller($seller , $id)
    {
        $date  = date('Y-m-d');
        $data =  DB::table("system_" . $id)->where("item_seller" , $seller)->get();

        $sales = 0;
        foreach($data as $mini_data)
        {
            $sales += $mini_data->item_price;
        }
        return $sales;
    }
}
?>