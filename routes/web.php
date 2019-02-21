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
Route::get("admin/post/add","Admin\PostController@newpost")->name('admin_get_post_add');
Route::get("postlist","Admin\PostController@postlist")->name('postlist');


Route::get("admin/brand/add", "Admin\BrandController@add")->name("admin_get_brand_add");
