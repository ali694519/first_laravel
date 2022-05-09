<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\phone;

class UserController extends Controller
{
    //
    public function index(Request $request) {
        // $name = 'itTeam';
        // $users = array(
        //     'name'=> 'Ali Mohammad',
        //     'Phone'=>'+639351548685',
        //     'email'=>'ali694519@gmail.com'
        // );
        // return view('user',compact('name','users'));
            return $request->fullUrl();
    }
    public function insertRecord() {

        $phone = new phone();
        $phone->phone='63951548952';
        $user = new User();
        $user->name='Jafer';
        $user->email='jj125@gmail.com';
        $user->password='dgegegegege';
        $user->save();
        $user->phone()->save($phone);
        return 'Record Has Been Created Successfully';

    }

    public function getuserphone($id) {
        $phone = User::find($id)->phone;
        return $phone;
    }


}
