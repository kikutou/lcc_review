<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;
use Validator;

class UserController extends Controller
{
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
  public function index(Request $request){

    $users = User::all();

    return view("admin.user.index", ["users" => $users]);
  }
}
