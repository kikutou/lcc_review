<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
  public function newpost(Request $request){

    return view("admin.post.new_post_form");
  }
  public function postlist(Request $request){

    return view("admin.post.post_list");
  }
}
