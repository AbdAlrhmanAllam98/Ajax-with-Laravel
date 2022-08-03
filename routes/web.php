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

Route::view('/','show-repo');
Route::post('/get-data',[RepoController::class,'getDataFromUser']);

Route::controller(PostController::class)->group(function(){
    Route::get('posts/all','index');
    Route::post('post/add','addPostWithAjax');
    Route::get('post/edit/{id}','getEditPost');
    Route::post('post/edit/{id}','editPostWithAjax');
    Route::delete('post/delete/{id}','deletePostWithAjax');
});
