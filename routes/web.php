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
// post
Route::get("admin/post/add","Admin\PostController@add")->name('admin_get_post_add');
Route::get("admin/post/index","Admin\PostController@index")->name('admin_get_post_index');

// brand
Route::get("admin/brand/add", "Admin\BrandController@add")->name("admin_get_brand_add");

// country
Route::get("admin/country/add", "Admin\CountryController@add")->name("admin_get_country_add");
Route::post("admin/country/add", "Admin\CountryController@add")->name("admin_post_country_add");
Route::get("admin/country/index", "Admin\CountryController@index")->name("admin_get_country_index");
// city
Route::get("admin/city/add", "Admin\CityController@add")->name("admin_get_city_add");
Route::get("admin/city/index", "Admin\CityController@index")->name("admin_get_city_index");
//airport
Route::get("admin/airport","Admin\AirportController@add")->name("admin_get_air_add");
