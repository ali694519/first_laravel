<?php

use App\Http\Controllers\sioController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PproductController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\mailController;
use App\Http\Controllers\paginationContoller;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\uploadController;
use GuzzleHttp\Client;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');c
Route::get('/users',[UserController::class,'index'])->name('users.index');
// Route::get('/',[PproductController::class,'index'])->name('product.index');
Route::get('/posts',[ClientController::class,'getAllPost'])->name('posts.getAllPost');
Route::get('/add-posts',[ClientController::class,'addPost'])->name('add-posts.addPost');
Route::get('/update-posts',[ClientController::class,'UpdatPost'])->name('update-posts.UpdatPost');
Route::get('/delete-posts/{id}',[ClientController::class,'deletePost'])->name('delete-posts.deletePost');

//Form Login
Route::get('/login',[LoginController::class,'index'])->name('login.index')->middleware('checker');
Route::post('/login',[LoginController::class,'loginSubmit'])->name('login.loginSubmit');
//Session
Route::get('/session/get',[SessionController::class,'getSessionData'])->name('session.getSessionData');
Route::get('/session/add',[SessionController::class,'storeSessionData'])->name('session.storeSessionData');
Route::get('/session/remove',[SessionController::class,'deleteSessionData'])->name('session.deleteSessionData');

//Database
Route::get('/posts',[PostController::class,'getAllPost'])->name('post.getAllPost');

Route::get('/addpost',[PostController::class,'addpost'])->name('addpost.addpost');
Route::post('/addpost',[PostController::class,'addPostSubmit'])->name('addpostsub.addPostSubmit');
Route::post('/addpost',[PostController::class,'addPostSubmit'])->name('addpostsub.addPostSubmit');
Route::get('/post_id/{id}',[PostController::class,'getPostById'])->name('post_id.getPostById');
Route::get('/delete_id/{id}',[PostController::class,'deletePost'])->name('delete_id.deletePost');
Route::get('/edit_post/{id}',[PostController::class,'editPost'])->name('edit_post.editPost');
Route::post('/update_post',[PostController::class,'UpdatePost'])->name('update.post');

Route::get('/inner',[PostController::class,'innerJoinCaluse'])->name('inner.innerJoinCaluse');
Route::get('/right',[PostController::class,'rightJoinCaluse'])->name('right.rightJoinCaluse');
Route::get('/getAll',[PostController::class,'getAllposts'])->name('getAll.getAllposts');

// Pagination
Route::get('/allUser',[paginationContoller::class,'allUser'])->name('allUser.uses');
//Upload File
Route::get('/upload',[uploadController::class,'upload'])->name('upload.get');
Route::post('/upload',[uploadController::class,'uploadFile'])->name('uploadFile.post');
//Lang
// Route::get('/{lang}',function($lang) {
//     // App::setlocale($lang);
//     return view('upload');
// });
// Send Mail
Route::get('/smail',[mailController::class,'sendEmail']);

//one to one
Route::get('/onetoone',[UserController::class,'insertRecord'])->name('onetoone.insertRecord');
// Get User phone
Route::get('/getuserr/{id}',[UserController::class,'getuserphone'])->name('get.user');

Auth::routes( ['verify'=>true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
