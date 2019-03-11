<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;
class MailController extends Controller
{
    //
    public function send()
 {
       $name = 'cheng';
       // Mail::send()的返回值为空，所以可以其他方法进行判断
       Mail::send('emails.test',['name'=>$name],function($message){
           $to = 'cheng19941029@gmail.com';
           $message ->to($to)->subject('邮件测试');
       });
       // 返回的一个错误数组，利用此可以判断是否发送成功
       dd(Mail::failures());


       Mail::raw('你好，我是PHP程序！', function ($message) {
          $to = 'cheng19941029#@gmail.com';
          $message ->to($to)->subject('纯文本信息邮件测试');
});
 }
}
