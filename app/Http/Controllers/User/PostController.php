<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Post;
use App\Model\User;
use App\Model\Brand;
use App\Model\PostBrand;
use App\Model\Master\Category;
use App\Service\CommentService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    //index
    public function index(Request $request)
    {

        $posts = Post::query();

        if ($request->mtb_category_id) {
            $posts->where("mtb_category_id", $request->mtb_category_id);
        }

        if ($request->brand_id) {
            $brand_id = $request->brand_id;
            $posts->whereHas("brands", function ($q) use ($brand_id) {
                $q->where('brands.id', $brand_id);
            });
        }

        if ($request->key_word) {
            $key_word = $request->key_word;

            $posts->where("title", "LIKE", '%' . $key_word . '%');
        }

        $posts = $posts->paginate(9);
        $categories = Category::all();
        $brands = Brand::all();


        return view("user.post.index", ["posts" => $posts, 'brands' => $brands, 'categories' => $categories]);
    }


    //detail
    public function detail(Request $request, $id)
    {
        if ($request->isMethod("GET")) {
            $post = Post::where('id', $id)->first();
            //same brand posts brand id
            $brands = $post->brands;
            $brand = null;
            foreach ($brands as $one_brand) {
                $brand = $one_brand;
                break;
            }
            //get same brand posts
            if ($brand) {
                $posts = Post::query();
                $same_brand_posts = $posts->whereHas("brands", function ($q) use ($brand) {
                    $q->where('brands.id', $brand->id);
                })->get();
            } else {
                $same_brand_posts = null;
            }

            //same category posts
            $same_category_posts = Post::where('mtb_category_id', $post->mtb_category_id)->get();

            // login check
            $login_check = Auth::user();


            // comment list
            $comments = new CommentService;
            $topic_code = 'post_' . $id;
            $comments = $comments->get_comments($topic_code);

            $comments = array_reverse($comments);


            return view("user.post.detail", [
                'post' => $post,
                "same_brand_posts" => $same_brand_posts,
                "same_category_posts" => $same_category_posts,
                "comments" => $comments,
                "login_check" => $login_check,
            ]);
        } else {
            // add comment
            $comment = new CommentService();
            $id = $request->id;

            $topic_code = 'post_' . $id;
            $comment_content = array(
                "title" => $request->title,
                "content" => $request->input("content")
            );

            $user_code = Auth::user()->nickname;

            // check anonymity
            if ($request->anonymity == 1) {
                $items[] = array(
                    "item_code" => "anonymity",
                    "grade" => "1"
                );
            } else {
                $items[] = array(
                    "item_code" => "anonymity",
                    "grade" => "0"
                );
            }

            $add_comment = $comment->add_comment($topic_code, $comment_content, $items, $user_code);

            if ($add_comment) {
                return redirect()->back()->with(["message" => "コメント成功"]);
            } else {
                return redirect()->back()->with(["message" => "コメント失敗"]);
            }
        }
    }
}
