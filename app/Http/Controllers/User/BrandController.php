<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Brand;
use App\Model\Flight;
use Illuminate\Support\Facades\Storage;
use App\Service\CommentService;




class BrandController extends Controller
{


    public function index(Request $request){

        $brands = Brand::query();
        if($request->key_word) {

          $key_word = $request->key_word;

          $brands->where("brand_name", "LIKE", '%'.$key_word.'%');
        }

        $brands = Brand::all();
        return view("user.brand.index", ['brands' => $brands]);
    }


    public function detail(Request $request, $id){
      //传值的话 new commrntservice后面加()
        $service = new CommentService();
        //判断是get方法或者是post方法
        if($request->isMethod("get")) {
        $comments = $service->get_comments("brand_" . $id);

        $result = array();
        foreach($comments as $comment){
          foreach($comment["items"] as $something){
            $result[] = $something;

          }
        }

        $brand = Brand::where('id',$id)->first();
        return view("user.brand.detail",['brand' => $brand,"comments" => $comments,"results" => $result]);
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
