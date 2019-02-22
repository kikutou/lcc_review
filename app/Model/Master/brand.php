<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class brand extends Model
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
        "brand_name.required" => "航空会社名を入力してください。",
        "brand_name.between" => ":min以上:max以内の航空会社名を入力してください。",
        "logo_picture.img" => "図を挿入してください。",
        "brand_introduction.between" => "100字以内の説明を入力してください。",
        "home_page" => "urlを入力してください。",
      ];
}
