<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
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

    //index
    public function index(Request $request)
    {

        $posts = Post::paginate(config("parameters.admin.pagination_per_page"));
        return view("admin.post.index", ["posts" => $posts]);
    }


    //detail
    public function detail(Request $request, $id)
    {
        $post = Post::find($id);
        return view("admin.post.detail", ['post' => $post]);
    }

    //add
    public function add(Request $request)
    {

        if ($request->isMethod("GET")) {
            $brands = Brand::all();
            $categories = Category::all();
            $admins = Admin::all();
            return view("admin.post.add", ['brands' => $brands, 'categories' => $categories, 'admins' => $admins]);

        } else {

            $validator = Validator::make($request->all(), Post::$validation_rules, Post::$validation_messages);

            if ($validator->fails()) {
                return redirect(route("admin_get_post_add"))->withErrors($validator)->withInput();
            }

            $picture_path = $request->file('picture')->store('public/pictures');
            $picture_path = str_replace("public", "storage", $picture_path);

            $post = new Post;
            $post->title = $request->title;
            $post->picture = $picture_path;
            $post->createdate = Carbon::today();
            $post->mtb_category_id = $request->mtb_category_id;
            $post->admin_id = $request->admin_id;
            $post->start_time = $request->start_time;
            $post->finish_time = $request->finish_time;
            $post->content = $request->post_content;
            $post->save();
            if ($request->brand_ids) {
                foreach ($request->brand_ids as $brand_id) {
                    $post_brand = new PostBrand;
                    $post_brand->post_id = $post->id;
                    $post_brand->brand_id = $brand_id;
                    $post_brand->save();
                }
            }
            //with用来携带session去index
            return redirect(route("admin_get_post_index"))->with(["message" => '挿入成功']);
        }
    }


    //edit
    public function edit(Request $request, $id)

    {
        if ($request->isMethod("GET")) {
            $brands = Brand::all();
            $categories = Category::all();
            $admins = Admin::all();
            $post = Post::where('id', $id)->first();

            return view("admin.post.edit", ['post' => $post, 'brands' => $brands, 'categories' => $categories, 'admins' => $admins]);

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
            $post->content = $request->post_content;
            $post->save();

            if ($request->brand_ids) {
                    foreach ($request->brand_ids as $brand_id) {
                        $post_brand = new PostBrand;
                        $post_brand->post_id = $post->id;
                        $post_brand->brand_id = $brand_id;
                        $post_brand->save();
                    }
            }
            return redirect(route("admin_get_post_index"))->with(['message'=>'変更成功']);
        }
    }

    //delete
    public function delete(Request $request, $id)

    {
        if ($request->isMethod("GET")) {
            $post = Post::where('id', $id)->first();

            return view("admin.post.delete", ['post' => $post]);

        } else {
            $post = Post::find($request->post_id)->delete();
            $post_brand = PostBrand::where('post_id', $request->post_id)->delete();
            return redirect(route("admin_get_post_index"))->with(['message'=>'削除成功']);
        }
    }



}
