<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DTPController extends Controller
{
    public function showDayTourPack()
    {
        return view('pages.daytourpack');
    }
}