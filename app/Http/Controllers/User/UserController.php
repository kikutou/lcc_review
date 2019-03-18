<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\UserDetail;
use App\Model\Master\AddressPrefecture;
use App\Model\Master\UserStatus;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Service\SendMailService;

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
      $user->token = str_random(20);
      $user->nickname = $request->nickname;
      $user->mtb_user_status_id ="1";
      $user->save();

      //add detail
      $user_detail = new UserDetail;
      $user_detail->user_id = $user->id;
      $user_detail->name = $request->name;
      $user_detail->birthday = $request->birthday;
      $user_detail->mtb_address_prefecture_id = $request->mtb_address_prefecture_id;
      $user_detail->address_detail = $request->address_detail;
      $user_detail->gender_flg = $request->gender_flg;
      $user_detail->save();

        // ここで認証メールを発送
      $to = $request->email;
      $subject = '【LCCの会員認証】認証確認メール';

      $token = $user->token;
      $view = 'user.user.mail';
      $data = ['token' => $token];
      $send_mail = new SendMailService;
      $send_mail->sendmail($to, $subject, $view, $data);

      return redirect(route("user_get_home"))->with(["message" => '会員加入が成功しました']);
    }
  }

  public function verify(Request $request, $token)
  {
    $user = User::where('token',$token)->first();
    if($user)
    {
      $user->email_verified_at = Carbon::now();
      $user->mtb_user_status_id = 2;
      $user->save();

      return view("user.user.verify");
    }else
    {
      return redirect(route("user_get_home"))->with(["message" => '会員認証が失敗しました']);
    }
  }


  public function login(Request $request)
  {
    if($request->isMethod("get"))
    {
      return view('user.user.login');
    } else
    {
      $validator = Validator::make($request->all(), User::$validation_sign_in_rules, User::$validation_sign_in_messages);
      if($validator->fails()) {
        return redirect(route("user_get_login"))->withInput()->withErrors($validator);
      }

      $email = $request->email;
      $password = $request->password;

      $user = User::where('email',$email)->first();
      if ($user->mtb_user_status_id == 1) {
          // もう一度認証メールを発送
        $to = $request->email;
        $subject = '【LCCの会員認証】再認証確認メール';

        $token = $user->token;
        $view = 'user.user.mail';
        $data = ['token' => $token];
        $send_mail = new SendMailService;
        $send_mail->sendmail($to, $subject, $view, $data);

        return redirect(route("user_get_home"))->with(["message" => '会員認証を完了してください']);
      }else {
        $remember = $request->remember;
        if (Auth::attempt(['email'=>$email, 'password'=>$password], $remember))
        {
          return redirect(route("user_get_home"))->with(["message" => "ログイン成功しました"]);
        }else
        {
          return redirect(route("user_get_login"))->with(["message" => "エラーが発生した、もう一回ログインしてください"]);
        }
      }
    }
  }

  public function logout(Request $request)
  {
    Auth::guard("user")->logout();
    return redirect(route('user_get_home'));
  }
}
