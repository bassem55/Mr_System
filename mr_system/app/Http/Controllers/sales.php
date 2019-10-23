<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\classes\sales_class;

use App\classes\my_system_class;

class sales extends Controller
{
    private $sales;
    private $sys;
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('have_system_middleware');
        $this->sales = new sales_class();

        $this->sys = new my_system_class();
    }
    public function index()
    {
        $id = Auth::id();
        $data = $this->sys->get_page_data($id);

        $seller_names = "";
        for($i=0;$i<count($data);$i++)
        {
            $mini_data = $data[$i];
            if($mini_data[0] == "item_seller_names")
            {
                $seller_names = $mini_data[1];
            }
        }
        if($seller_names != "")
            return view('system.sales')->with('seller_names' , $seller_names);
        else
            return view('system.sales');
    }
    public function sales_for_today(Request $req)
    {
        $id = Auth::id();
        return $this->sales->sales_for_today($id);
    }
    public function sales_for_sp_day(Request $req)
    {
        if($req->has('date'))
        {
            $id = Auth::id();
            return $this->sales->sales_for_sp_day($req->input('date') , $id);
        }
        else
        {
           return "Error";
        }
    }
    public function sales_for_this_month()
    {
        $id = Auth::id();
        return $this->sales->sales_for_this_month($id);
    }
    public function sales_for_sp_month(Request $req)
    {
        if($req->has('month') && $req->has('year'))
        {
            $id = Auth::id();
            return $this->sales->sales_for_sp_month($req->input('month') , $req->input('year') , $id);
        }
        else
        {
            return "Error";
        }
    }
    public function sales_for_this_year()
    {
        $id = Auth::id();
        return $this->sales->sales_for_this_year($id);
    }
    public function sales_for_sp_year(Request $req)
    {
        if($req->has('year'))
        {
            $id = Auth::id();
            return $this->sales->sales_for_sp_year($req->input('year') , $id);
        }
        else
        {
            return "Error";
        }
    }
    public function sales_for_seller(Request $req)
    {
        if($req->has('data'))
        {
            $id = Auth::id();
            return $this->sales->sales_for_seller($req->input('data') , $id);
        }
    }
}
