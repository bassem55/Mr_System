<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\classes\edit_system_class;

use App\traits\comman;
class edit_system extends Controller
{
    use comman;
    private $edit;
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('have_system_middleware');
        $this->edit = new edit_system_class(); 
    }
    public function index()
    {
        $id = Auth::id();
        $data = $this->edit->get_all_data($id);
        
        $items = ""; 
        $seller = "";
        $types = "";

        $items_array = array();
        $item_types_array = array();
        $item_seller_names_array = array();
        for($i=0;$i<count($data);$i++)
        {
            $mini_data = $data[$i];
            if($mini_data[0] == "items_data")
            {
                $items = $mini_data[1];
            }
            else if($mini_data[0] == "item_types_data")
            {
                $types = $mini_data[1];
            }
            else if($mini_data[0] == "item_seller_names_data")
            {
                $seller = $mini_data[1];
            }
            else if($mini_data[0] == "items_array")
            {
                $items_array = $mini_data[1];
            }
            else if($mini_data[0] == "item_types_array")
            {
                $item_types_array = $mini_data[1];
            }
            else if($mini_data[0] == "item_seller_names_array")
            {
                $item_seller_names_array = $mini_data[1];
            }
        }
        $attr = $this->what_system_have($id); 

        return view('system.edit_system' , [
            'data' => $attr ,
            'items' => $items ,
            'types' =>$types ,
            'sellers' => $seller,
            'items_array' => $items_array,
            'item_types_array' => $item_types_array,
            'item_seller_names_array' =>$item_seller_names_array
        ]);
    }
    public function edit_system(Request $req)
    {
        if($req->has('data'))
        {
            $id = Auth::id();
            $data = json_decode($req->input("data") , true);
            $this->edit->edit_system($id , $data);
        }
    }
}
