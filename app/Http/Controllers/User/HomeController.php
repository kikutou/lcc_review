<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home;
use App\Model\Post;
use App\Model\Brand;
use App\Model\User;
use App\Model\Master\Category;
use Mail;

class HomeController extends Controller
{


  //index
  public function index(Request $request){
    if($request->isMethod("GET")) {
      $posts = Post::all();
      $categories = Category::all();
      $brands = Brand::all();
      return view("user.home.home",["posts" => $posts, "categories" => $categories, "brands" =>$brands]);
    } else {
      $validator = Validator::make($request->all(), Country::$validation_rules, Country::$validation_messages);
      if($validator->fails()) {
        return redirect(route("admin_get_home"))->withErrors($validator)->withInput();
      }
      

  }
  // mail
  public function mail(){
    $send_mail = Mail::raw('This is a test', function($message){
      $message->from('mailtest1321@163.com', 'DongYJ');
      $message->subject('This is a title');
      $message->to('717391232@qq.com');
    });
    dd($send_mail);

  }
}
