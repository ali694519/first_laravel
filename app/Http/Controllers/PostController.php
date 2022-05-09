<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\comment;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;

class PostController extends Controller
{
    //
    public function getAllPost() {
        $posts = post::wherebetween('id',[3,8])->orderby('id','ASC')->get();
        return view('posts',compact('posts'));
    }
    public function addpost() {
        return view('add-post');
    }

    public function addPostSubmit(Request $rerquest) {
        DB::table('posts')->insert([
            'title'=>$rerquest->title,
            'body'=>$rerquest->body
        ]);
        return back()->with('post_created','Post Has Been Created SuccessFaully');
    }
    public function getPostById($id) {
        $post = DB::table('posts')->where("id",$id)->first();
        return view('post_id',compact('post'));
    }

    public function deletePost($id) {
        DB::table('posts')->where("id",$id)->delete();
        return back()->with('post_deleted','Post Has Been deleted SuccessFaully');
    }
    public function editPost($id) {
        $post = DB::table('posts')->where("id",$id)->first();
        return view('edit-post',compact('post'));
    }
    public function UpdatePost(Request $request) {
             DB::table('posts')->where("id",$request->id)->update([
            'title'=>$request->title,
            'body'=>$request->body
        ]);
        return back()->with('post_Update','Post Has Been Updated SuccessFaully');
    }

    public function innerJoinCaluse() {
        $request = DB::table('users')
        ->join('posts','users.id','=','posts.user_id')
        ->select('users.name','posts.title','posts.body')
        ->get();
        return $request;
    }
    public function rightJoinCaluse() {
        $result = DB::table('users')
        ->rightJoin('posts','users.id','=','posts.user_id')
        ->get();
        return $result;
    }
    public function leftJoinCaluse() {
        $result = DB::table('users')
        ->leftJoin('posts','users.id','=','posts.user_id')
        ->get();
        return $result;
    }
    public function getAllposts() {
        $posts = post::all();
        return $posts;
    }

    // one to many
    public function addpost_Relationship() {
        $post = new post();
        $post->title = 'mohammad';
        $post->body = 'this is new mohammad';
        $post->save();

        return "Post Has Been Created";
    } 
    public function addcomment($id) {
        $post = post::find($id);
        $comment = new comment();
        $comment->comment = 'new comment';
        $post->comment()->save($comment);
        return "Comment Has Been Posted";
    }


 }
