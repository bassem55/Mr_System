<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


use App\classes\my_system_class;

//use App\traits\his_test;

class my_system extends Controller
{

    private $sys;
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('have_system_middleware');

        $this->sys = new my_system_class();
    }
    public function index()
    {
        $id = Auth::id();
        $all_data = $this->sys->get_page_data($id);
        $system_have = $this->sys->what_system_have($id);
        $sys_name = $this->sys->get_sys_name($id);
        return view("system.my_system")->with("data" , $all_data)->with("all_data" , $system_have)->with("sys_name" , $sys_name);
    }
    public function add_new_data(Request $req)
    {
        if($req->has('data'))
        {
            $id=Auth::id();
            $data = json_decode($req->input('data') , true);
            $res = $this->sys->add_new_data($data , $id);

            if($res == "lol")
            {
                return "lol";
            }
            else
            {
                return "error";
            }

        }
    }
    public function get_data(Request $req)
    {
        $id = Auth::id();
        $res = $this->sys->get_data($id);
        return json_encode($res);
    }
}
