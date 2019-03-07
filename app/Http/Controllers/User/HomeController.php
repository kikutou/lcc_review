<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Post;
use App\Model\Brand;
use App\Model\User;
use App\Model\Master\Category;


class HomeController extends Controller
{
  //index
  public function index(Request $request){
    $posts = Post::all();
    $categories = Category::all();
    $brands = Brand::all();
      return view("user.home.home",["posts" => $posts, "categories" => $categories, "brands" =>$brands]);
  }
}
