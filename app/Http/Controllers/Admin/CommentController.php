<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Comment;
use App\Model\User;
use App\Model\Flight;
use App\Model\Brand;
use App\Model\Master\InspectStatus;
use Validator;


class CommentController extends Controller
{
  //add
  public function add(Request $request){

    if($request->isMethod("GET")) {
      $brands = Brand::all();
      $flights = Flight::all();
      $users = User::all();
      $inspect_statuses = InspectStatus::all();
      return view("admin.comment.add",['brands'=>$brands, 'flights'=>$flights, 'users'=>$users, 'inspect_statuses'=>$inspect_statuses]);
    } else {

      $validator = Validator::make($request->all(), Comment::$validation_rules, Comment::$validation_messages);
      if($validator->fails()) {
        return redirect(route("admin_get_comment_add"))->withErrors($validator)->withInput();
      }

      $comment = new Comment;
      $comment->user_id = $request->user_id;
      $comment->brand_id = $request->brand_id;
      $comment->flight_id = $request->flight_id;
      $comment->service = $request->service;
      $comment->clean = $request->clean;
      $comment->food = $request->food;
      $comment->seat = $request->seat;
      $comment->entertainment  = $request->entertainment;
      $comment->cost_performance = $request->cost_performance;
      $comment->comment = $request->comment;
      $comment->mtb_inspect_status_id = $request->mtb_inspect_status_id;
      $comment->inspect_memo  = $request->inspect_memo;
      $comment->save();

      return redirect(route("admin_get_comment_index"));
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
      $inspect_statuses = InspectStatus::all();
      $comment = Comment::where('id',$id) ->first();

      return view("admin.comment.edit", ["comment" => $comment, 'brands'=>$brands, 'flights'=>$flights, 'users'=>$users, 'inspect_statuses'=>$inspect_statuses]);

    } else {
      $comment = Comment::find($request->comment_id);
      $comment->user_id = $request->user_id;
      $comment->brand_id = $request->brand_id;
      $comment->flight_id = $request->flight_id;
      $comment->service = $request->service;
      $comment->clean = $request->clean;
      $comment->food = $request->food;
      $comment->seat = $request->seat;
      $comment->entertainment  = $request->entertainment;
      $comment->cost_performance = $request->cost_performance;
      $comment->comment = $request->comment;
      $comment->mtb_inspect_status_id = $request->mtb_inspect_status_id;
      $comment->inspect_memo  = $request->inspect_memo;
      $comment->save();


      return redirect(route("admin_get_comment_index", ["comment" => $comment]));
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
      return redirect(route("admin_get_comment_index"));
    }
  }

  //detail
  public function detail(Request $request, $id){
    $comment = Comment::where('id',$id)->first();
    return view("admin.comment.detail",['comment' => $comment]);
  }

}
