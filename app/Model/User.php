<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
  protected $table = 'users';

  public static $validation_rules = [
    "mail" => "required|unique:users,mail",
    "password" => "required|between:6,8",
    "nickname" => "required|between:1,10",
    "user_status" => "required"
  ];
  public static $validation_rules_for_edit = [
    "mail" => "required|unique:users,mail",
    "nickname" => "required|between:1,10",
    "user_status" => "required"
  ];

  public static $validation_messages = [
    "mail.required" => "メールを入力してください。",
    "mail.unique" => "このメールは既に存在している",
    "password.required" => "パスワードを入力してください。",
    "password.between" => ":min桁から:max桁までのパスワードを入力してください。",
    "nickname.required" => "ニックネームを入力してください。",
    "nickname.between" => ":min桁から:max桁までのニックネームを入力してください。",
    "user_status.required" => "会員状態を選択してください"
  ];
  public static $validation_messages_for_edit = [
    "mail.required" => "メールを入力してください。",
    "mail.unique" => "このメールは既に存在している",
    "nickname.required" => "ニックネームを入力してください。",
    "nickname.between" => ":min桁から:max桁までのニックネームを入力してください。",
    "user_status.required" => "会員状態を選択してください"
  ];
  public static $validation_sign_up_rules = [
    "mail" => "required|unique:users,mail",
    "password" => "required|between:6,8",
    "nickname" => "required|between:1,10",
  ];
  public static $validation_sign_up_messages = [
    "mail.required" => "メールを入力してください。",
    "mail.unique" => "このメールは既に存在している",
    "password.required" => "パスワードを入力してください。",
    "password.between" => ":min桁から:max桁までのパスワードを入力してください。",
    "nickname.required" => "ニックネームを入力してください。",
    "nickname.between" => ":min桁から:max桁までのニックネームを入力してください。",
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
