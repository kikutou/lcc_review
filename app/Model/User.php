<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  protected $table = 'users';

  public static $validation_rules = [
    "email" => "required|unique:users,email",
    "password" => "required|between:6,8",
    "nickname" => "required|between:1,10",
    "user_status" => "required"
  ];
  public static $validation_rules_for_edit = [
    "email" => "required|unique:users,email",
    "nickname" => "required|between:1,10",
    "user_status" => "required"
  ];

  public static $validation_messages = [
    "email.required" => "メールを入力してください。",
    "email.unique" => "このメールは既に存在している",
    "password.required" => "パスワードを入力してください。",
    "password.between" => ":min桁から:max桁までのパスワードを入力してください。",
    "nickname.required" => "ニックネームを入力してください。",
    "nickname.between" => ":min桁から:max桁までのニックネームを入力してください。",
    "user_status.required" => "会員状態を選択してください"
  ];
  public static $validation_messages_for_edit = [
    "email.required" => "メールを入力してください。",
    "email.unique" => "このメールは既に存在している",
    "nickname.required" => "ニックネームを入力してください。",
    "nickname.between" => ":min桁から:max桁までのニックネームを入力してください。",
    "user_status.required" => "会員状態を選択してください"
  ];
  public static $validation_sign_up_rules = [
    "email" => "required|unique:users,email",
    "password" => "required|between:6,8",
    "nickname" => "required|between:1,10",
  ];
  public static $validation_sign_up_messages = [
    "email.required" => "メールを入力してください。",
    "email.unique" => "このメールは既に存在している",
    "password.required" => "パスワードを入力してください。",
    "password.between" => ":min桁から:max桁までのパスワードを入力してください。",
    "nickname.required" => "ニックネームを入力してください。",
    "nickname.between" => ":min桁から:max桁までのニックネームを入力してください。",
  ];
  public static $validation_sign_in_rules = [
    "email" => "exists:users,email",
  ];
  public static $validation_sign_in_messages = [
    "email.exists" => "まず会員登録お願いいたします。",
  ];

  public function setPassword($password) {
    $this->password = Hash::make($password);
  }

  public function generateUserCode($prefixLength = 2, $suffixLength = 4)
  {
    $re = '';
    $letter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    while(strlen($re)<2) {
      $re .= $letter[rand(0, strlen($letter)-1)]; /** 获取字母 */
    }
    list($usec, $sec) = explode(" ", microtime()); /** 获取微秒时间戳 */
    $microtime = str_replace(".", "", ((float)$usec + (float)$sec)); /** 处理字符串 */
    $tail = substr($microtime, -4);/** 截取后四位保证不出现重复 */
    $result = $re.$tail;
    return $result;
  }

  use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

  //conect with table user_details
  public function detail(){
    return $this->hasOne('App\Model\UserDetail');
  }
  //conect comments
  public function comment(){
    return $this->hasMany('App\Model\Comment');
  }
  //conect user_status
  public function user_status(){
    return $this->belongsTo('App\Model\Master\UserStatus', "mtb_user_status_id");
  }
}
