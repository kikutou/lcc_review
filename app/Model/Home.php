<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
  protected $table = "subscribe_mails";
  
  public static $validation_rules = [
    "mail" => "required",
    "brand_id" => "required_without:category_id",
    "category_id" => "required_without:brand_id"
  ];

  public static $validation_messages = [
    "mail.required" => "メールアドレスを入力してください。",
    "brand_id.required_without:category_id" => "航空会社かカテゴリーの中でいずれか一つを選択してください",
    "category_id.required_without:brand_id" => "航空会社かカテゴリーの中でいずれか一つを選択してください"
  ];
}
