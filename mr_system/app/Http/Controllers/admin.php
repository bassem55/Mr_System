<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class admin extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function go_to_admin()
    {
        return view('admin');
    }
}
