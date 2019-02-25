<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;
//validation
use Validator;



class UserController extends Controller
{

  //add
  public function add(Request $request){

    if($request->isMethod("GET")) {
      return view("admin.user.add");
    } else {
      $validator = Validator::make($request->all(), User::$validation_rules, User::$validation_messages);
      if($validator->fails()) {
        return redirect(route("admin_get_user_add"))->withErrors($validator)->withInput();
      }
      $user = new User;
      $user->mail = $request->mail;
      $user->setPassword($request->password);
      $user->code = $user->generateUserCode();
      $user->nickname = $request->nickname;
      $user->save();
      return redirect(route("admin_get_user_index"));
    }
  }

  //index
  public function index(Request $request){

    $users = User::all();

    return view("admin.user.index", ["users" => $users]);
  }
  public function edit(Request $request, $id)
{
  if($request->isMethod("GET")) {
    $user = User::where('id',$id) ->first();

    return view("admin.user.edit", ['user' => $user]);

  } else {

    $validator = Validator::make($request->all(), User::$validation_rules, User::$validation_messages);
    if($validator->fails()) {
      return redirect(route("admin_get_user_index"))->withErrors($validator)->withInput();
    }

    $user = User::find($request->user_id);
    $user->mail = $request->mail;
    $user->nickname = $request->nickname;
    $user->save();
    return redirect(route("admin_get_user_index"));
  }
}


public function delete(Request $request, $id)

{
if($request->isMethod("GET")) {
  $user = User::where('id',$id) ->first();

  return view("admin.user.delete");

} else {

  $user = User::find($request->user_id)->delete();

  $user->save();


  return redirect(route("admin_get_user_index"));
}
}

}
