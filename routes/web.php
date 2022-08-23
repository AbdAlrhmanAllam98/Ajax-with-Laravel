<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RepoController;
use Illuminate\Support\Facades\Route;

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

Route::view('/','welcome');

Route::view('show/repos','repo.show-repo');
Route::post('/get-data',[RepoController::class,'getDataFromUser']);

Route::controller(PostController::class)->group(function(){
    Route::get('posts/all','index');
    Route::post('post/add','addPostWithAjax');
    Route::get('post/edit/{post}','getEditPost');
    Route::put('post/edit/{post}','editPostWithAjax');
    Route::delete('post/delete/{post}','deletePostWithAjax');
    Route::delete('post/delete-selected','deleteSelectedPostsWithAjax');
});
