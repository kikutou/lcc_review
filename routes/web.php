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
/*
trainning
*/
Route::group(['prefix'=>'name'],function(){
  Route::get('name_test', 'NameController@form');
  Route::get('name_test_result', 'NameController@result');
});
