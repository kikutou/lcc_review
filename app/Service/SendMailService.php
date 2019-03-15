<?php
/**
 * Created by PhpStorm.
 * User: juteng
 * Date: 2019/03/12
 * Time: 13:44
 */

namespace App\Service;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;


class SendMailService extends Model
{
    public function sendmail($type, $from, $to, $subject, $content, Array $items = null)
    {
        $info = array("from" => $from, "to" => $to, "subject" => $subject);

        if($type == "send"){
            //html mail
            $send_mail = Mail::$type($content, $items, function($message) use($info)
            {
                $message->from($info['from'],'LCC Review');
                $message->subject($info['subject']);
                $message->to($info['to']);
            });
             return $send_mail;
        }else{
            //text mail
            $send_mail = Mail::$type($content, function($message) use($info)
            {
                $message->from($info['from'],'LCC Review');
                $message->subject($info['subject']);
                $message->to($info['to']);
            });
            return $send_mail;
        }
    }

    
}