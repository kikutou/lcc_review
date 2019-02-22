<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $table = "mtb_categories";

  public static $validation_rules = [
    "category" => "required|between:1,15",
    "category_introduction" => "string|between:0,100"
  ];

  public static $validation_messages = [
    "category.required" => "カテゴリ名を入力してください。",
    "category.between" => ":min以上:max以内のカテゴリ名を入力してください。",
    "category_introduction.string" => "文字を入力してください。",
    "category_introduction.between" => "100字以内の説明を入力してください。",
  ];
}
