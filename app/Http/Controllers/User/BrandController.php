<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Brand;
use App\Service\CommentService;
use Illuminate\Support\Facades\Auth;


class BrandController extends Controller
{
    public function index(Request $request)
    {
        $brands = Brand::query();
        if ($request->keyword) {
            $key_word = $request->keyword;
            $brands->where("brand_name", "LIKE", '%' . $key_word . '%');
        }
        $brands = $brands->get();
        return view("user.brand.index", ['brands' => $brands]);
    }


    public function detail(Request $request, $id)
    {

        $service = new CommentService();

        if ($request->isMethod("get")) {
            $topic_code = "brand_" . $id;
            $comments = $service->get_comments($topic_code);

            $result = array();
            foreach ($comments as $comment) {
                foreach ($comment["items"] as $item) {
                    $result[] = $item;
                }
            }
            $comments = array_reverse($comments);

            $login_check = Auth::check();
            $brand = Brand::where('id', $id)->first();

            return view("user.brand.detail", ['brand' => $brand, "comments" => $comments, "results" => $result, "login_check" => $login_check]);
        } else {

            $service = new CommentService();

            $topic_code = "brand_" . $id;

            $comment = array(
                "title" => $request->comment_title,
                "content" => $request->comment_content
            );

            $items = array(
                array(
                    "item_code" => "service",
                    "grade" => $request->service
                ),
                array(
                    "item_code" => "cleaness",
                    "grade" => $request->cleaness
                ),
                array(
                    "item_code" => "food",
                    "grade" => $request->food
                ),
                array(
                    "item_code" => "chair",
                    "grade" => $request->chair
                ),
                array(
                    "item_code" => "entertainment",
                    "grade" => $request->entertainment
                ),
                array(
                    "item_code" => "cost",
                    "grade" => $request->cost
                ),
            );

            $service->add_comment($topic_code, $comment, $items);


            return redirect(route("user_get_brand_detail", ["id" => $id]));


        }

    }


}
