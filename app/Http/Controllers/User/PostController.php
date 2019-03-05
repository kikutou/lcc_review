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

      $posts = Post::query();

      if($request->mtb_category_id) {
        $posts->where("mtb_category_id", $request->mtb_category_id);
      }

      if($request->brand_id) {
        $brand_id = $request->brand_id;
        $posts->whereHas("brands", function($q) use($brand_id){
          $q->where('brands.id', $brand_id);
        });

      //   $brand_posts = PostBrand::query()->where("brand_id", $request->brand_id)->get();
      //   $post_ids= array();
      //   foreach($brand_posts as $brand_post) {
      //     $post_ids[] = $brand_post->post_id;
      //   }
      //   $posts->whereIn("id", $post_ids);
    }

      if($request->key_word) {
        $key_word = $request->key_word;

        $posts->where("title", "LIKE", '%' . $key_word . '%');
      }

      $posts = $posts->paginate(9);


      $categories = Category::all();
      $brands = Brand::all();
      return view("user.post.index", ["posts" => $posts, 'brands'=> $brands, 'categories'=>$categories]);
    }


    //detail
    public function detail(Request $request,$id){
      $post = Post::where('id', $id)->first();
      $brand = PostBrand::where('post_id',$id)->first();
      if ($brand) {
        $same_brand_posts = PostBrand::where('brand_id',$brand->brand_id)->posts->offset(1)->limit(4)->get();
      }else {
        $same_brand_posts = null;
      }

      $same_category_posts = Post::where('mtb_category_id',$post->mtb_category_id)->offset(1)->limit(4)->get();

      return view("user.post.detail", ['post' => $post, "same_brand_posts" => $same_brand_posts, "same_category_posts" => $same_category_posts]);
    }
}
