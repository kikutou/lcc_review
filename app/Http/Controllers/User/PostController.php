<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Post;
use App\Model\Brand;
use App\Model\PostBrand;
use App\Model\Master\Category;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    //index
    public function index(Request $request){
      $posts = Post::paginate(9);
      $categories = Category::all();
      $brands = Brand::all();
      return view("user.post.index", ["posts" => $posts, 'brands'=> $brands, 'categories'=>$categories]);
    }

    //detail
    public function detail(Request $request,$id){
      $post = Post::where('id', $id)->first();

      if (isset($post->postbrand->brand_id)) {
        $brands = PostBrand::where('post_id',$id)->get();
        $same_brand_posts = Post::where('id', $id)->brands->offset(1)->limit(4)->get();
      }else {
        $same_brand_posts = null;
        $brands = null;
      }

      $same_category_posts = Post::where('mtb_category_id',$post->mtb_category_id)->offset(1)->limit(4)->get();

      return view("user.post.detail", ['post' => $post, 'brands'=> $brands, "same_brand_posts" => $same_brand_posts, "same_category_posts" => $same_category_posts]);
    }
}
