<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerLogin extends Controller
{
    //
    public function index(Request $r)
    {
        return view('login/index');
    }
}
