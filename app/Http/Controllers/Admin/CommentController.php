<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Comment;
use App\Model\User;
use App\Model\Flight;
use App\Model\Brand;
use Validator;


class CommentController extends Controller
{
  //add
  public function add(Request $request){

    if($request->isMethod("GET")) {
      $brands = Brand::all();
      $flights = Flight::all();
      $users = User::all();
      return view("admin.comment.add",['brands'=>$brands, 'flights'=>$flights, 'users'=>$users]);
    } else {

      $validator = Validator::make($request->all(), Comment::$validation_rules, Comment::$validation_messages);
      if($validator->fails()) {
        return redirect(route("admin_get_comment_add"))->withErrors($validator)->withInput();
      }

      $comment = new Comment;
      $service = $request->service;
      $clean = $request->clean;
      $food = $request->food;
      $seat = $request->seat;
      $entertainment = $request->entertainment;
      $cost_performance = $request->cost_performance;

      $comment->user_id = $request->user_id;
      $comment->brand_id = $request->brand_id;
      $comment->flight_id = $request->flight_id;
      $comment->service = $service;
      $comment->clean = $clean;
      $comment->food = $food;
      $comment->seat = $seat;
      $comment->entertainment  = $entertainment;
      $comment->cost_performance = $cost_performance;
      $comment->comment = $request->comment;
      $comment->average_score = $comment->average_score = $comment->average_score($service,$clean,$food,$seat,$entertainment,$cost_performance);
      $comment->save();

      return redirect(route("admin_get_comment_index"))->with(["message" => '挿入成功']);
    }
  }

  //index
  public function index(Request $request){
    $comments = Comment::paginate(config("parameters.admin.pagination_per_page"));

    return view("admin.comment.index", ["comments" => $comments]);
  }

  //edit
  public function edit(Request $request, $id)

  {
    if($request->isMethod("GET")) {
      $brands = Brand::all();
      $flights = Flight::all();
      $users = User::all();
      $comment = Comment::where('id',$id) ->first();

      return view("admin.comment.edit", ["comment" => $comment, 'brands'=>$brands, 'flights'=>$flights, 'users'=>$users]);

    } else {
      $comment = Comment::find($request->comment_id);
      $service = $request->service;
      $clean = $request->clean;
      $food = $request->food;
      $seat = $request->seat;
      $entertainment = $request->entertainment;
      $cost_performance = $request->cost_performance;
      $comment->user_id = $request->user_id;
      $comment->brand_id = $request->brand_id;
      $comment->flight_id = $request->flight_id;
      $comment->service = $service;
      $comment->clean = $clean;
      $comment->food = $food;
      $comment->seat = $seat;
      $comment->entertainment  = $entertainment;
      $comment->cost_performance = $cost_performance;
      $comment->comment = $request->comment;
      $comment->average_score = $comment->average_score($service,$clean,$food,$seat,$entertainment,$cost_performance);
      $comment->save();


      return redirect(route("admin_get_comment_index", ["comment" => $comment]))->with(["message" => '編集成功']);
    }
  }

  //delete
  public function delete(Request $request, $id)

  {
    if($request->isMethod("GET")) {
      $comment = Comment::where('id',$id) ->first();

      return view("admin.comment.delete", ['comment' => $comment]);

    } else {
      $comment = Comment::find($request->comment_id)->delete();
      return redirect(route("admin_get_comment_index"))->with(["message" => '削除成功']);
    }
  }

  //detail
  public function detail(Request $request, $id){
    if($request->isMethod("GET")){
      $comment = Comment::where('id',$id)->first();
      return view("admin.comment.detail",['comment' => $comment]);
    } else {
      $comment = Comment::find($request->comment_id);
      if ($comment->read_by_admin_at == null) {
        $comment->read_by_admin_at = date('Y-m-d\TH:i:s');
        $comment->save();
      }
      return redirect(route("admin_get_comment_index", ["comment" => $comment]));

    }
  }
}
