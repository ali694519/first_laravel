<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ClientController extends Controller
{
    //
    public function getAllPost() {
        $response = Http::get('http://jsonplaceholder.typicode.com/posts');
        return $response->json();
    }

    public function addPost() {
        $response = Http::post('http://jsonplaceholder.typicode.com/posts',
        ['userid'=>1,
         'title'=>'New Post',
         'body'=>'New Post Description']);
        return $response->json();
    }


    public function UpdatPost() {
        $response = Http::put('http://jsonplaceholder.typicode.com/posts/1',
        [
         'title'=>'Update Post',
         'body'=>'Update Post Description'
        ]);
        return $response->json();
    }

    public function deletePost($id) {
        $response = Http::delete('http://jsonplaceholder.typicode.com/posts/'.$id);
        return $response->json();
    }


}
