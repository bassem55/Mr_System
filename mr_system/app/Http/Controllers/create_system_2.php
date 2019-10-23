<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\classes\create_system_2_class;
class create_system_2 extends Controller
{
    private $create2;
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('have_create_1_middleware');

        $this->create2 = new create_system_2_class();
    }
    public function index()
    {
        $data = $this->create2->what_system_have();
        return view("system.create_system_2")->with("data" , $data);
    }
    public function add_info_to_system(Request $req)
    {
        if($req->has("data"))
        {
            $data =json_decode($req->input("data") ,true);
            if($this->create2->add_info_to_system($data) == "lol")
            {
                return "done";
            }
        }
            
    }
}