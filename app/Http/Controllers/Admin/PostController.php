<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Post;
use App\Model\Brand;
use App\Model\Admin;
use App\Model\PostBrand;
use App\Model\Master\Category;
use Illuminate\Support\Facades\Storage;
use Validator;


class PostController extends Controller
{
  //add
  public function add(Request $request){

    if($request->isMethod("GET")) {
      $brands = Brand::all();
      $categories = Category::all();
      $admins = Admin::all();
      return view("admin.post.add",['brands'=>$brands, 'categories'=>$categories, 'admins'=>$admins]);
    } else {

      $validator = Validator::make($request->all(), Post::$validation_rules, Post::$validation_messages);
      if($validator->fails()) {
        return redirect(route("admin_get_post_add"))->withErrors($validator)->withInput();
      }

      $picture_path = $request->file('picture')->store('public/pictures');

      $post = new Post;
      $post->title = $request->title;
      $post->picture = str_replace("public", "storage", $picture_path);
      $post->createdate = date('Y/m/d');
      $post->mtb_category_id = $request->mtb_category_id;
      $post->admin_id = $request->admin_id;
      $post->start_time = $request->start_time;
      $post->finish_time = $request->finish_time;
      $post->content = $request->content;
      $post->save();
      if ($request->brand_ids) {
        if($post->save()){
          foreach($request->brand_ids as $brand_id){
            $post_brand = new PostBrand;
            $post_brand->post_id = $post->id;
            $post_brand->brand_id = $brand_id;
            $post_brand->save();
          }
        }
      }


      return redirect(route("admin_get_post_index"));
    }
  }

  //index
  public function index(Request $request){
    $posts = Post::paginate(config("parameters.admin.pagination_per_page"));

    return view("admin.post.index", ["posts" => $posts]);
  }

  //edit
  public function edit(Request $request, $id)

  {
    if($request->isMethod("GET")) {
      $brands = Brand::all();
      $categories = Category::all();
      $admins = Admin::all();
      $post = Post::where('id',$id) ->first();

      return view("admin.post.edit", ['post' => $post, 'brands'=>$brands, 'categories'=>$categories, 'admins'=>$admins]);

    } else {


      $post = Post::find($request->post_id);
      $post->title = $request->title;
      if ($request->file('picture')) {
        $picture_path = $request->file('picture')->store('public/pictures');
        $post->picture = str_replace("public", "storage", $picture_path);
      }
      $post->mtb_category_id = $request->mtb_category_id;
      $post->admin_id = $request->admin_id;
      $post->start_time = $request->start_time;
      $post->finish_time = $request->finish_time;
      $post->content = $request->content;
      $post->save();

      if ($request->brand_ids) {
        if($post->save()){
          foreach($request->brand_ids as $brand_id){
            $post_brand = new PostBrand;
            $post_brand->post_id = $post->id;
            $post_brand->brand_id = $brand_id;
            $post_brand->save();
          }
        }
      }
      return redirect(route("admin_get_post_index"));
    }
  }

  //delete
  public function delete(Request $request, $id)

  {
    if($request->isMethod("GET")) {
      $post = Post::where('id',$id) ->first();

      return view("admin.post.delete", ['post' => $post]);

    } else {
      $post = Post::find($request->post_id)->delete();
      $post_brand = PostBrand::where('post_id', $request->post_id)->delete();
      return redirect(route("admin_get_post_index"));
    }
  }

  //detail
  public function detail(Request $request, $id){
    $post = Post::where('id',$id)->first();
    $brands = PostBrand::where('post_id',$id)->get();
    return view("admin.post.detail",['post' => $post, 'brands'=>$brands]);
  }

}
