<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class paginationContoller extends Controller
{
    //
    public function allUser() {
        $users = User::paginate(10);
        return view('uses',compact('users'));
    }

}
