<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

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

Route::get('/', function(){
    return view('home');
});

Route::group(['middleware' => 'auth', 'prefix' => 'home'], function(){
    Route::get('/posts/new', [PostController::class, 'create']);
    Route::post('/posts/new', [PostController::class, 'store']);
    Route::get('/posts/{post_id}/show', [PostController::class, 'index']); // Show posts and comments with related id
    Route::get('/posts/{post_id}', [PostController::class, 'edit']);
    Route::post('/posts/{post_id}', [PostController::class, 'update']);
    Route::delete('posts/{post_id}', [PostController::class, 'destroy']);

    Route::get('/comments/{post_id}/new', [CommentController::class, 'create']);
    Route::post('/comments/{post_id}/new', [CommentController::class, 'store']);
    Route::get('/comments/{post_id}/{comment_id}', [CommentController::class, 'edit']);
    Route::post('/comments/{post_id}/{comment_id}', [CommentController::class, 'update']);
    Route::get('/comments/{post_id}/{comment_id}', [CommentController::class, 'show_delete']);
    Route::delete('/comments/{post_id}/{comment_id}', [CommentController::class, 'destroy']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



