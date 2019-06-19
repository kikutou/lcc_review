<?php
/**
 * Created by PhpStorm.
 * User: kiku
 * Date: 2019/03/12
 * Time: 13:44
 */

namespace App\Service;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;


class SendMailService extends Model
{
    public function sendmail($to, $subject, $view, $date = null, $type = 'send', $from = ['from'=>'cheng19941029@gmail.com', 'name'=>'LCC Review'])
    {
        $info = ["to" => $to, "subject" => $subject, "from" => $from];

        if($type == "send"){
            //html mail
            $send_mail = Mail::$type($view, $date, function($message) use($info)
            {   
                $from = $info['from'];
                $message->from($from['from'], $from['name']);
                $message->subject($info['subject']);
                $message->to($info['to']);
            });
             return $send_mail;
        }else{
            //text mail
            $send_mail = Mail::$type($view, $date, function($message) use($info)
            {
                $from = $info['from'];
                $message->from($from['from'], $from['name']);
                $message->subject($info['subject']);
                $message->to($info['to']);
            });
            return $send_mail;
        }
    }

    
}