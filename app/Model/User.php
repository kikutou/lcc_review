<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  protected $table = 'users';

  public static $validation_rules = [
    "mail" => "required|unique:users,mail",
    "password" => "required|between:6,8",
    "code" => "required|unique:users,code",
    "nickname" => "required|between:1,10",
    "passwordcheck" => "same:password"
  ];

  public static $validation_messages = [
    "mail.required" => "メールを入力してください。",
    "mail.unique" => "このメールは既に存在している",
    "password.required" => "パスワードを入力してください。",
    "password.between" => ":min桁から:max桁までのパスワードを入力してください。",
    "code.required" => "会員番号を入力してください。",
    "code.unique" =>  "この会員番号は既に存在している",
    "nickname.required" => "ニックネームを入力してください。",
    "nickname.between" => ":min桁から:max桁までのニックネームを入力してください。",
    "passwordcheck.same" => "パスワードを確認してください"
  ];
}
