<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
      protected $table = "brands";
      public static $validation_rules = [
        "brand_name" => "required|between:1,10",
        "logo_picture" => "image",
        "profile_picture" => "image",
        "brand_introduction" => "string|between:0,100",
        "home_page" => "url",
      ];

      public static $validation_messages = [
        "brand_name.required" => "航空会社名は必ず入力してください。",
        "brand_name.between" => ":min以上:max以内の航空会社名を入力してください。",
        "logo_picture.image" => "図を挿入してください。",
        "profile_picture.image" => "図を挿入してください。",
        "brand_introduction.string" => "説明文を必ず入力してください。",
        "brand_introduction.between" => "100字以内の説明を入力してください。",
        "home_page.url" => "正しい形式のurlを入力してください。",
      ];
}
