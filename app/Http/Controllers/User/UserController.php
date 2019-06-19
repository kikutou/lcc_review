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
use App\Service\SendMailService;
use App\Model\SubscribeMail;
use App\Model\MailBrand;
use App\Model\MailCategory;
use App\Model\Brand;
use App\Model\Master\Category;




class UserController extends Controller
{
    //add
    public function add(Request $request)
    {

        if ($request->isMethod("GET")) {
            $prefectures = AddressPrefecture::all();
            $user_statuses = UserStatus::all();
            return view("user.user.add", ['prefectures' => $prefectures, 'user_statuses' => $user_statuses]);
        } else {

            $validator = Validator::make($request->all(), User::$validation_sign_up_rules, User::$validation_sign_up_messages);
            if ($validator->fails()) {
                return redirect(route("user_get_user_add"))->withInput()->withErrors($validator);
            }


            $user = new User;
            $user->email = $request->email;
            $mail_for_subscribe = $request->email;
            $user->setPassword($request->password);
            $user->code = $user->generateUserCode();
            $user->token = str_random(20);
            $user->nickname = $request->nickname;
            $user->mtb_user_status_id = "1";
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

            //add subscribe mail and detail
            if($request->subscribe == 1)
            {
                $mail = new SubscribeMail;
                $mail->mail = $mail_for_subscribe;
                $mail->token = str_random(20);
                $mail->subscribed_at = Carbon::now();
                $mail->save();

                foreach (Brand::pluck('id') as $brandid) {
                    $mail_brand = new MailBrand;
                    $mail_brand->subscribe_mail_id = $mail->id;
                    $mail_brand->brand_id = $brandid;
                    $mail_brand->save();
                }

                foreach (Category::pluck('id') as $categoryid) {
                    $mail_category = new MailCategory;
                    $mail_category->subscribe_mail_id = $mail->id;
                    $mail_category->category_id = $categoryid;
                    $mail_category->save();
                }
            }

            // ここで認証メールを発送
            $to = $request->email;
            $subject = '【LCCの会員認証】認証確認メール';

            $token = $user->token;
            $view = 'user.user.mail';
            $data = ['token' => $token];
            $send_mail = new SendMailService;
            $send_mail->sendmail($to, $subject, $view, $data);

            return redirect(route("user_get_home"))->with(["message" => '会員加入が成功しました。購読成功。']);
        }
    }

    public function verify(Request $request, $token)
    {
        $user = User::where('token', $token)->first();
        if ($user) {
            $user->email_verified_at = Carbon::now();
            $user->mtb_user_status_id = 2;
            $user->save();

            return view("user.user.verify");
        } else {
            return redirect(route("user_get_home"))->with(["message" => '会員認証が失敗しました']);
        }
    }


    public function login(Request $request)
    {
        if ($request->isMethod("get")) {
            return view('user.user.login');
        } else {

            $email = $request->email;
            $password = $request->password;

            $user = User::where('email', $email)->first();
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
            } else {
                if ($request->remember) {
                    $remember = true;
                } else {
                    $remember = false;
                }

                if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
                    return redirect()->intended();
                } else {
                    return redirect()->back()->with(["message" => "ログインできませんでした。"]);
                }
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route("user_get_login");
    }
}
