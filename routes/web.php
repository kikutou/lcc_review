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
Route::get("admin/post/add", "Admin\PostController@add")->name("admin_get_post_add");
Route::post("admin/post/add", "Admin\PostController@add")->name("admin_post_post_add");
Route::get("admin/post/index", "Admin\PostController@index")->name("admin_get_post_index");
Route::get("admin/post/{id}/edit", "Admin\PostController@edit")->name("admin_get_post_edit");
Route::post("admin/post/{id}/edit", "Admin\PostController@edit")->name("admin_post_post_edit");
Route::get("admin/post/{id}/delete", "Admin\PostController@delete")->name("admin_get_post_delete");
Route::post("admin/post/{id}/delete", "Admin\PostController@delete")->name("admin_post_post_delete");
//postdetail
Route::get("admin/post/{id}/detail", "Admin\PostController@detail")->name("admin_get_post_detail");

// brand
Route::get("admin/brand/add", "Admin\BrandController@add")->name("admin_get_brand_add");
Route::post("admin/brand/add", "Admin\BrandController@add")->name("admin_post_brand_add");
Route::get("admin/brand/index", "Admin\BrandController@index")->name("admin_get_brand_index");
Route::get("admin/brand/{id}/edit", "Admin\BrandController@edit")->name("admin_get_brand_edit");
Route::post("admin/brand/{id}/edit", "Admin\BrandController@edit")->name("admin_post_brand_edit");
Route::get("admin/brand/{id}/delete", "Admin\BrandController@delete")->name("admin_get_brand_delete");
Route::post("admin/brand/{id}/delete", "Admin\BrandController@delete")->name("admin_post_brand_delete");

// country
Route::get("admin/country/add", "Admin\CountryController@add")->name("admin_get_country_add");
Route::post("admin/country/add", "Admin\CountryController@add")->name("admin_post_country_add");
Route::get("admin/country/index", "Admin\CountryController@index")->name("admin_get_country_index");
Route::get("admin/country/{id}/edit", "Admin\CountryController@edit")->name("admin_get_country_edit");
Route::post("admin/country/{id}/edit", "Admin\CountryController@edit")->name("admin_post_country_edit");
Route::get("admin/country/{id}/delete", "Admin\CountryController@delete")->name("admin_get_country_delete");
Route::post("admin/country/{id}/delete", "Admin\CountryController@delete")->name("admin_post_country_delete");


// city
Route::get("admin/city/add", "Admin\CityController@add")->name("admin_get_city_add");
Route::post("admin/city/add", "Admin\CityController@add")->name("admin_post_city_add");
Route::get("admin/city/index", "Admin\CityController@index")->name("admin_get_city_index");

//airport
Route::get("admin/airport/add","Admin\AirportController@add")->name("admin_get_airport_add");
Route::post("admin/airport/add", "Admin\AirportController@add")->name("admin_post_airport_add");
Route::get("admin/airport/index", "Admin\AirportController@index")->name("admin_get_airport_index");
Route::get("admin/airport/{id}/edit", "Admin\AirportController@edit")->name("admin_get_airport_edit");
Route::post("admin/airport/{id}/edit", "Admin\AirportController@edit")->name("admin_post_airport_edit");

//category
Route::get("admin/category/add","Admin\CategoryController@add")->name("admin_get_category_add");
Route::post("admin/category/add", "Admin\CategoryController@add")->name("admin_post_category_add");
Route::get("admin/category/index", "Admin\CategoryController@index")->name("admin_get_category_index");
Route::get("admin/category/{id}/edit", "Admin\CategoryController@edit")->name("admin_get_category_edit");
Route::post("admin/category/{id}/edit", "Admin\CategoryController@edit")->name("admin_post_category_edit");
Route::get("admin/category/{id}/delete", "Admin\CategoryController@delete")->name("admin_get_category_delete");
Route::post("admin/category/{id}/delete", "Admin\CategoryController@delete")->name("admin_post_category_delete");

// user
Route::get("admin/user/add", "Admin\UserController@add")->name("admin_get_user_add");
Route::post("admin/user/add", "Admin\UserController@add")->name("admin_post_user_add");
Route::get("admin/user/index", "Admin\UserController@index")->name("admin_get_user_index");
Route::get("admin/user/{id}/edit", "Admin\UserController@edit")->name("admin_get_user_edit");
Route::post("admin/user/{id}/edit", "Admin\UserController@edit")->name("admin_post_user_edit");
Route::get("admin/user/{id}/delete", "Admin\UserController@delete")->name("admin_get_user_delete");
Route::post("admin/user/{id}/delete", "Admin\UserController@delete")->name("admin_post_user_delete");
//userdetail
Route::get("admin/user/{id}/detail", "Admin\UserController@detail")->name("admin_get_user_detail");

// admin
Route::get("admin/admin/add", "Admin\AdminController@add")->name("admin_get_admin_add");
Route::post("admin/admin/add", "Admin\AdminController@add")->name("admin_post_admin_add");
Route::get("admin/admin/index", "Admin\AdminController@index")->name("admin_get_admin_index");
Route::get("admin/admin/{id}/edit", "Admin\AdminController@edit")->name("admin_get_admin_edit");
Route::post("admin/admin/{id}/edit", "Admin\AdminController@edit")->name("admin_post_admin_edit");
Route::get("admin/admin/{id}/delete", "Admin\AdminController@delete")->name("admin_get_admin_delete");
Route::post("admin/admin/{id}/delete", "Admin\AdminController@delete")->name("admin_post_admin_delete");
