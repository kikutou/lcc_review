<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
  public function add(Request $request){

    return view("admin.post.add");
  }
  public function index(Request $request){

    return view("admin.post.index");
  }
}
