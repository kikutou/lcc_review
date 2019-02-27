<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Post;
use Illuminate\Support\Facades\Storage;
use Validator;

class PostController extends Controller
{
  public function add(Request $request){

    if($request->isMethod("GET")) {
      return view("admin.post.add");
    } else {

      $validator = Validator::make($request->all(), Post::$validation_rules, Post::$validation_messages);
      if($validator->fails()) {
        return redirect(route("admin_get_post_add"))->withErrors($validator)->withInput();
      }

      $picture_path = $request->file('picture')->store('public/pictures');

      $post = new Post;
      $post->title = $request->title;
      $post->logo_picture = str_replace("public", "storage", $picture_path);
      $post->post_introduction = $request->post_introduction;
      $post->createdate = date('Y/m/d');
      $post->save();

      return redirect(route("admin_get_post_index"));
    }
  }

    public function index(Request $request){
        $posts = Post::all();
        return view("admin.post.index", ["posts" => $posts]);
    }
    public function edit(Request $request, $id)

  {
    if($request->isMethod("GET")) {
      $post = Post::where('id',$id) ->first();

      return view("admin.post.edit", ['post' => $post]);

    } else {


      $post = Post::find($request->post_id);
      $post->post_name = $request->post_name;
      $post->logo_picture = $request->logo_picture;
      $post->profile_picture = $request->profile_picture;
      $post->post_introduction = $request->post_introduction;
      $post->home_page = $request->home_page;
      $post->save();


      return redirect(route("admin_get_post_index"));
    }
  }
  public function delete(Request $request, $id)

  {
  if($request->isMethod("GET")) {
    $post = Post::where('id',$id) ->first();

    return view("admin.post.delete", ['post' => $post]);

  } else {
    $post = Post::find($request->post_id)->delete();
    return redirect(route("admin_get_post_index"));
  }
  }
}
