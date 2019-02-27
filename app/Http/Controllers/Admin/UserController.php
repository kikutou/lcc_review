<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\UserDetail;
use App\Model\Master\AddressPrefecture;
use Validator;

class UserController extends Controller
{
  public function add(Request $request){

    if($request->isMethod("GET")) {
      $prefectures = AddressPrefecture::all();
      return view("admin.user.add",['prefectures'=>$prefectures]);
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

      //detail
      $user_detail = new UserDetail;
      $user_detail->user_id = $user->id;
      $user_detail->name = $request->name;
      $user_detail->birthday = $request->birthday;
      $user_detail->mtb_address_prefecture_id = $request->mtb_address_prefecture_id;
      $user_detail->address_detail = $request->address_detail;
      $user_detail->gender_flg = $request->gender_flg;
      $user_detail->save();


      return redirect(route("admin_get_user_index"));
    }
  }
  //index
  public function index(Request $request){

    $users = User::all();

    return view("admin.user.index", ["users" => $users]);
  }

  //edit
  public function edit(Request $request, $id)
  {
    if($request->isMethod("GET")) {
      $prefectures = AddressPrefecture::all();
      $user = User::where('id',$id) ->first();
      $user_detail = $user->detail->where('user_id',$id)->first();
      return view("admin.user.edit", ['user' => $user, 'user_detail' => $user_detail, 'prefectures'=>$prefectures]);

    } else {
      $user = User::find($request->user_id);
      $user_detail = $user->detail;

      //Validator
      if ($user->mail != $request->mail) {
        $validator = Validator::make($request->all(), User::$validation_rules_for_edit, User::$validation_messages_for_edit);
        if($validator->fails()) {
          return redirect(route("admin_get_user_edit", ['id' => $request->id]))->withErrors($validator)->withInput();
        }
      }


      $user->mail = $request->mail;
      $user->nickname = $request->nickname;
      $user->save();
      $user_detail->user_id = $request->user_id;
      $user_detail->name = $request->name;
      $user_detail->birthday = $request->birthday;
      $user_detail->mtb_address_prefecture_id = $request->mtb_address_prefecture_id;
      $user_detail->address_detail = $request->address_detail;
      $user_detail->gender_flg = $request->gender_flg;
      $user_detail->save();
      return redirect(route("admin_get_user_index"));
    }
  }

  //delete
  public function delete(Request $request, $id)

  {
    if($request->isMethod("GET")) {
      $user = User::where('id',$id) ->first();
      $user_detail = $user->detail;

      return view("admin.user.delete", ['user' => $user]);

    } else {
      $user = User::find($request->user_id);
      $user_detail = $user->detail->where('user_id',$request->user_id)->delete();
      $user->delete();
      return redirect(route("admin_get_user_index"));
    }
  }

  //user detail

  public function detail(Request $request, $id){
    $user = User::where('id',$id) ->first();

    return view("admin.user.detail",['user' => $user]);
  }

}
