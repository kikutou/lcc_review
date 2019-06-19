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


Route::prefix('admin')->middleware(["auth:admin"])->namespace('Admin')->group(function () {
    Route::get("/", "DashboardController@index")->name("admin_get_admin");

    // post
    Route::get("posts", "PostController@index")->name("admin_get_post_index");
    Route::get("post/{id}/detail", "PostController@detail")->name("admin_get_post_detail");
    Route::get("post/add", "PostController@add")->name("admin_get_post_add");
    Route::post("post/add", "PostController@add")->name("admin_post_post_add");
    Route::get("post/{id}/edit", "PostController@edit")->name("admin_get_post_edit");
    Route::post("post/{id}/edit", "PostController@edit")->name("admin_post_post_edit");
    Route::get("post/{id}/delete", "PostController@delete")->name("admin_get_post_delete");
    Route::post("post/{id}/delete", "PostController@delete")->name("admin_post_post_delete");

    // comment
    Route::get("comments", "CommentController@index")->name("admin_get_comment_index");
    Route::get("comment/{id}/detail", "CommentController@detail")->name("admin_get_comment_detail");
    Route::post("comment/{id}/detail", "CommentController@detail")->name("admin_post_comment_detail");
    Route::get("comment/add", "CommentController@add")->name("admin_get_comment_add");
    Route::post("comment/add", "CommentController@add")->name("admin_post_comment_add");
    Route::get("comment/{id}/edit", "CommentController@edit")->name("admin_get_comment_edit");
    Route::post("comment/{id}/edit", "CommentController@edit")->name("admin_post_comment_edit");
    Route::get("comment/{id}/delete", "CommentController@delete")->name("admin_get_comment_delete");
    Route::post("comment/{id}/delete", "CommentController@delete")->name("admin_post_comment_delete");


    // brand
    Route::get("brand/add", "BrandController@add")->name("admin_get_brand_add");
    Route::post("brand/add", "BrandController@add")->name("admin_post_brand_add");
    Route::get("brand/index", "BrandController@index")->name("admin_get_brand_index");
    Route::get("brand/{id}/edit", "BrandController@edit")->name("admin_get_brand_edit");
    Route::post("brand/{id}/edit", "BrandController@edit")->name("admin_post_brand_edit");
    Route::get("brand/{id}/delete", "BrandController@delete")->name("admin_get_brand_delete");
    Route::post("brand/{id}/delete", "BrandController@delete")->name("admin_post_brand_delete");
    Route::get("brand/{id}/detail", "BrandController@detail")->name("admin_get_brand_detail");

    //flight
    Route::get("flight/add", "FlightController@add")->name("admin_get_flight_add");
    Route::post("flight/add", "FlightController@add")->name("admin_post_flight_add");
    Route::get("flight/index", "FlightController@index")->name("admin_get_flight_index");
    Route::get("flight/{id}/edit","FlightController@edit")->name("admin_get_flight_edit");
    Route::post("flight/{id}/edit","FlightController@edit")->name("admin_post_flight_edit");

    // country
    Route::get("countries", "CountryController@index")->name("admin_get_country_index");
    Route::get("country/add", "CountryController@add")->name("admin_get_country_add");
    Route::post("country/add", "CountryController@add")->name("admin_post_country_add");
    Route::get("country/{id}/edit", "CountryController@edit")->name("admin_get_country_edit");
    Route::post("country/{id}/edit", "CountryController@edit")->name("admin_post_country_edit");
    Route::get("country/{id}/delete", "CountryController@delete")->name("admin_get_country_delete");
    Route::post("country/{id}/delete", "CountryController@delete")->name("admin_post_country_delete");


    // city
    Route::get("city/add", "CityController@add")->name("admin_get_city_add");
    Route::post("city/add", "CityController@add")->name("admin_post_city_add");
    Route::get("city/index", "CityController@index")->name("admin_get_city_index");

    //airport
    Route::get("airport/add","AirportController@add")->name("admin_get_airport_add");
    Route::post("airport/add", "AirportController@add")->name("admin_post_airport_add");
    Route::get("airport/index", "AirportController@index")->name("admin_get_airport_index");
    Route::get("airport/{id}/edit", "AirportController@edit")->name("admin_get_airport_edit");
    Route::post("airport/{id}/edit", "AirportController@edit")->name("admin_post_airport_edit");
    Route::get("airport/{id}/delete", "AirportController@delete")->name("admin_get_airport_delete");
    Route::post("airport/{id}/delete", "AirportController@delete")->name("admin_post_airport_delete");

    //category
    Route::get("category/add","CategoryController@add")->name("admin_get_category_add");
    Route::post("category/add", "CategoryController@add")->name("admin_post_category_add");
    Route::get("category/index", "CategoryController@index")->name("admin_get_category_index");
    Route::get("category/{id}/edit", "CategoryController@edit")->name("admin_get_category_edit");
    Route::post("category/{id}/edit", "CategoryController@edit")->name("admin_post_category_edit");
    Route::get("category/{id}/delete", "CategoryController@delete")->name("admin_get_category_delete");
    Route::post("category/{id}/delete", "CategoryController@delete")->name("admin_post_category_delete");

    // user
    Route::get("users", "UserController@index")->name("admin_get_user_index");
    Route::get("user/{id}/detail", "UserController@detail")->name("admin_get_user_detail");
    Route::get("user/add", "UserController@add")->name("admin_get_user_add");
    Route::post("user/add", "UserController@add")->name("admin_post_user_add");
    Route::get("user/{id}/edit", "UserController@edit")->name("admin_get_user_edit");
    Route::post("user/{id}/edit", "UserController@edit")->name("admin_post_user_edit");
    Route::get("user/{id}/delete", "UserController@delete")->name("admin_get_user_delete");
    Route::post("user/{id}/delete", "UserController@delete")->name("admin_post_user_delete");

    // admin
    Route::get("admins", "AdminController@index")->name("admin_get_admin_index")->middleware("auth:admin");
    Route::get("add", "AdminController@add")->name("admin_get_admin_add");
    Route::post("add", "AdminController@add")->name("admin_post_admin_add");
    Route::get("{id}/edit", "AdminController@edit")->name("admin_get_admin_edit");
    Route::post("{id}/edit", "AdminController@edit")->name("admin_post_admin_edit");
    Route::get("{id}/delete", "AdminController@delete")->name("admin_get_admin_delete");
    Route::post("{id}/delete", "AdminController@delete")->name("admin_post_admin_delete");




});

//admin login
Route::get("admin/login", "Admin\AdminController@login")->name("admin_get_admin_login");
Route::post("admin/login", "Admin\AdminController@login")->name("admin_post_admin_login");
Route::get("admin/logout", "Admin\AdminController@logout")->name("admin_get_admin_logout");










// User pages

//Home
Route::get("/", "User\SubscribeMailController@index")->name("user_get_home");
// mail
Route::post("mail", "User\SubscribeMailController@index")->name("user_post_home");

//post
Route::get("posts", "User\PostController@index")->name("user_get_post_index");
Route::get("post/{id}/detail", "User\PostController@detail")->name("user_get_post_detail");
Route::post("post/{id}/detail","User\PostController@detail")->name("user_post_post_detail");
//brand
Route::get("brands", "User\BrandController@index")->name("user_get_brand_index");
Route::get("brand/{id}/detail", "User\BrandController@detail")->name("user_get_brand_detail");
Route::post("brand/{id}/detail", "User\BrandController@detail")->name("user_post_brand_detail");

//user
Route::get("register", "User\UserController@add")->name("user_get_user_add");
Route::post("register", "User\UserController@add")->name("user_post_user_add");
//verify
Route::any("verify/{token}", "User\UserController@verify")->name("user_verify");
    //login
Route::get("login", "User\UserController@login")->name("user_get_login");
Route::post("login", "User\UserController@login")->name("user_post_login");
    //logout
Route::get("logout", "User\UserController@logout")->name("user_get_logout");
