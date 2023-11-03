<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SasprasContoller extends Controller
{
    return view('inventories.index',[
        'inventories' => inventory::get(),
    ]);
}
