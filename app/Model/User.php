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
  ];

  public static $validation_messages = [
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
}
