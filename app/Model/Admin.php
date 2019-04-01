<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Admin extends Model implements AuthenticatableContract
{

  use Authenticatable;
    protected $table = "admins";

    //conect posts
    public function posts(){
      return $this->hasMany('App\Model\Post');
    }

    public function setPassword($password) {
      $this->password = Hash::make($password);
    }
    public static $validation_rules = [
      "admin_user" => "required|unique:admins,admin_user",
      "password" => "required|between:6,8"
    ];
    public static $validation_messages = [
      "password.required" => "パスワードを入力してください。",
      "password.between" => ":min桁から:max桁までのパスワードを入力してください。",
      "admin_user.required" => "管理者名を入力してください。",
      "admin_user.unique" => "この管理者は既に存在します。"
    ];
    public static $validation_rules_for_edit = [
      "admin_user" => "required|unique:admins,admin_user",
    ];

    public static $validation_messages_for_edit = [
      "admin_user.required" => "管理者名を入力してください。",
      "admin_user.unique" => "この管理者は既に存在します。"
    ];

}
