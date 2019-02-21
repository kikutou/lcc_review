<?php

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


Route::get("admin", "Admin\DashboardController@index");
Route::get("new-post","Admin\PostController@newpost")->name('newpost');
Route::get("postlist","Admin\PostController@postlist")->name('postlist');
