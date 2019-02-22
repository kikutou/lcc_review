<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = "mtb_countries";

    public static $validation_rules = [
      "value" => "required|between:1,15",
      "rank" => "required|integer|unique:mtb_countries, rank"
    ];

    public static $validation_messages = [
      "value.required" => "国名を入力してください。",
      "value.between" => ":min以上:max以内の国名を入力してください。",
      "rank.required" => "ランクを入力してください。"
    ];
}
