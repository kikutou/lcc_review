<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\SubscribeMail;
use App\Model\MailBrand;
use App\Model\MailCategory;
use App\Model\Post;
use App\Model\Brand;
use App\Model\User;
use App\Model\Master\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Validator;

class SubscribeMailController extends Controller
{

  //index
  public function index(Request $request){
    if($request->isMethod("GET")) {
      $posts = Post::all();
      $categories = Category::all();
      $brands = Brand::all();
      return view("user.home.home",["posts" => $posts, "categories" => $categories, "brands" =>$brands]);
    } else {
      $validator = Validator::make($request->all(), SubscribeMail::$validation_rules, SubscribeMail::$validation_messages);
      if($validator->fails()) {
        return redirect(route("user_get_home"))->withErrors($validator)->withInput();
      }
      // check mail exist
      $mail_check = SubscribeMail::where('mail',$request->mail)->first();

      if (!$mail_check) {
        //not exist
        $mail = new SubscribeMail;
        $mail->mail=$request->mail;
        $mail->token = str_random(20);
        $mail->subscribed_at=Carbon::now();
        $mail->save();

        if ($request->brand_ids) {

          // brand
          foreach($request->brand_ids as $brand_id){
            $mail_brand = new MailBrand;
            $mail_brand->subscribe_mail_id = $mail->id;
            $mail_brand->brand_id = $brand_id;
            $mail_brand->save();
          }
        }

        if ($request->category_ids) {
          // category
          foreach($request->category_ids as $category_id){
            $mail_category = new MailCategory;
            $mail_category->subscribe_mail_id = $mail->id;
            $mail_category->category_id = $category_id;
            $mail_category->save();
          }
        }

        // ここで認証メールを発送
        $mail_address = $request->mail;
        $token = $mail->token;
        $send_mail = Mail::send('user.home.mail',['token'=>$token, 'mail'=>$mail], function($message) use($mail_address){
          $message->from('cheng19941029@gmail.com','LCC Review');
          $message->subject('【LCCの記事購読】購読確認メール');
          $message->to($mail_address);
        });


       // session Message
       return redirect(route('user_get_home'))->with(["message"=>"購読成功"]);

      }else {
        // already have this mail
        echo "already exist";
        exit();
        $canceled_check = SubscribeMail::where('mail',$request->mail)->first()->canceled_at;
        $verify_check = SubscribeMail::where('mail',$request->mail)->first()->verified_at;
        if (!$canceled_check && $verify_check) {
          // キャンセルせずに再購読
          $mail_id = SubscribeMail::where('mail',$request->mail)->first()->id;
          // softdelete old data
          $brand_delete = MailBrand::where('subscribe_mail_id',$mail_id)->delete();
          $category_delete = MailCategory::where('subscribe_mail_id',$mail_id)->delete();

          if ($request->brand_ids) {
            // brand
            foreach($request->brand_ids as $brand_id){
              $mail_brand = new MailBrand;
              $mail_brand->subscribe_mail_id = $mail->id;
              $mail_brand->brand_id = $brand_id;
              $mail_brand->save();
            }
          }
          if ($request->category_ids) {
            // category
            foreach($request->category_ids as $category_id){
              $mail_category = new MailCategory;
              $mail_category->subscribe_mail_id = $mail->id;
              $mail_category->category_id = $category_id;
              $mail_category->save();
            }
        }elseif ($canceled_check && !$verify_check) {
          // 認証せずに再購読
        } elseif ($canceled_check && $verify_check) {
          // キャンセル後再購読
        }
      }
    }
  }
}
}
