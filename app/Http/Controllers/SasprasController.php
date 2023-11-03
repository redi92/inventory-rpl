<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SasprasController extends Controller
{
    public function home()
    {
        
        return view('inventories.index');
    }
}
