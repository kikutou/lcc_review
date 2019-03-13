<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\UserDetail;
use App\Model\Master\AddressPrefecture;
use App\Model\Master\UserStatus;
use Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  //add
  public function add(Request $request){

    if($request->isMethod("GET")) {
      $prefectures = AddressPrefecture::all();
      $user_statuses = UserStatus::all();
      return view("user.user.add",['prefectures'=>$prefectures, 'user_statuses'=>$user_statuses]);
    }else {

      $validator = Validator::make($request->all(), User::$validation_sign_up_rules, User::$validation_sign_up_messages);
      if($validator->fails()) {
        return redirect(route("user_get_user_add"))->withInput()->withErrors($validator);
      }

      $user = new User;
      $user->email = $request->email;
      $user->setPassword($request->password);
      $user->code = $user->generateUserCode();
      $user->nickname = $request->nickname;
      $user->mtb_user_status_id ="1";
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

      return redirect(route("user_get_post_index"))->with(["message" => '会員加入が成功しました']);
    }
  }

  public function login(Request $request)
  {
    if($request->isMethod("get")) 
    {
      return view('user.user.login');
    } else
     {
       $email = $request->email;
       $password = $request->password;
       
       // check if admin
      if(Auth::guard('admin')->attempt(['admin_user'=>$email,'password'=>$password]))
      {
        return redirect(route("admin_get_admin"));
      }elseif (Auth::attempt(['email'=>$email, 'password'=>$password])) 
      {
       return redirect(route("user_get_home"))->with(["message" => "ログイン成功しました"]);
      }else
      {
        return redirect(route("user_get_login"))->with(["message" => "エラーが発生した、もう一回ログインしてください"]);
      }


    }
  }
}
