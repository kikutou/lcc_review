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
        // wherehas('在哪张表里',function($a) use(函数外变量){where条件})
        $posts->whereHas("brands", function($q) use($brand_id){
          $q->where('brands.id', $brand_id);
        });

      //   $brand_posts = PostBrand::query()->where("brand_id", $request->brand_id)->get();
      //   $post_ids= array();
      //   foreach($brand_posts as $brand_post) {
      //     $post_ids[] = $brand_post->post_id;
      //   }
      //   $posts->whereIn("id", $post_ids);
      // }

      if($request->key_word) {
        $key_word = $request->key_word;
        // where('列名','Like',%模糊搜索用关键字%)
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
