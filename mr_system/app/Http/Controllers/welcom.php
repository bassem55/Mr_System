<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\traits\comman;

class welcom extends Controller
{
    use comman;
    public function index()
    {
        $id = Auth::id();
        return $this->smart_index($id);
    }
}
