<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Post;
use App\Model\Brand;
use App\Model\Master\Category;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    //index
    public function index(Request $request){
      $posts = Post::paginate(9);

      return view("user.post.index", ["posts" => $posts]);
    }

    //detail
    public function detail(Request $request,$id){
      $post = Post::where('id', $id)->first();
      $same_brand_posts = Post::where('brand_id',$post->brand_id)->offset(1)->limit(4)->get();
      $same_category_posts = Post::where('mtb_category_id',$post->mtb_category_id)->offset(1)->limit(4)->get();

      return view("user.post.detail", ['post' => $post, "same_brand_posts" => $same_brand_posts, "same_category_posts" => $same_category_posts]);
    }
}
