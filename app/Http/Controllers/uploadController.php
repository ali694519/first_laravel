<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class uploadController extends Controller
{
    //
    public function upload() {
        return view("upload");
    }

    public function uploadFile(Request $request) {
        $request->file->store('public');
        return "File Has Been Uploaded";
    }

}
