<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index() {

        return view('login');
    }
    // public function loginSubmit() {
    //     return "Form Submited";
    // }
    public function loginSubmit(Request $request) {
        // return $request->all();
        $validateData = $request->validate([
            'email' => 'required|email',
            'password'=> 'required|min:6|max:24'
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        return 'Email Is : '.$email.' And Your Password Is : '.$password;
    }

}
