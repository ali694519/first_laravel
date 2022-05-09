<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    //
    public function getSessionData(Request $request) {
        if($request->session()->has('name')) {
            echo $request->session()->get('name');
        }else {
            echo 'No Data In This Session';
        }
    }


    public function storeSessionData(Request $request) {
        $request->session()->put('name','Ali');
        echo "Data Has Been Added To The Session";
    }
    public function deleteSessionData(Request $request) {
        $request->session()->forget('name');
        echo "Data Has Been Remove From The Session";
    }

}
