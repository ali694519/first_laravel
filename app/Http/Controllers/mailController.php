<?php

namespace App\Http\Controllers;
use App\Mail\testMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class mailController extends Controller
{
    //
    public function sendEmail() {
        $details = [
            'title'=>'Mail From Ali Mohammad Test Laravel 10',
            'body' => 'This Is From Testing Mail Useing Laravel'
        ];
        Mail::to('aloshmohammad2001@gmail.com')->send(new testMail($details));
        return 'Email Sent';
    }

}
