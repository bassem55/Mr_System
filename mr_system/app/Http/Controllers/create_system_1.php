<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\donot_have_system_middleware;
use App\classes\create_system_1_class;
use Illuminate\Support\Arr;
class create_system_1 extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('donot_have_system_middleware');
    }
    public function index()
    {
        return view('system.create_system_1');
    }
    public function create_system(Request $req)
    {
        if($req->has("data"))
        {
            $data = json_decode($req->input("data") ,true); 
            $create1 = new create_system_1_class();
            if($create1->create_system($data) == "lol")
            {
                return "done";
            }
        }
    }
}
