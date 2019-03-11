<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubscribeMail extends Model
{
  protected $table = "subscribe_mails";

  public static $validation_rules = [
    "mail" => "required",
    "brand_ids" => "required_without:category_ids",
    "category_ids" => "required_without:brand_ids"
  ];

  public static $validation_messages = [
    "mail.required" => "メールアドレスを入力してください。",
    "brand_ids.required_without:category_ids" => "航空会社かカテゴリーの中でいずれか一つを選択してください",
    "category_ids.required_without:brand_ids" => "航空会社かカテゴリーの中でいずれか一つを選択してください"
  ];
  use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
