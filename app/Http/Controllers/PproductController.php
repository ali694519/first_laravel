<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PproductController extends Controller
{
    //
    public function index()
    {
        $sports = array('football','tennis','Basketball');

        return view('welcome',compact('sports'));

    }
}
