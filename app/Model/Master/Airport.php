<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
  protected $table = "mtb_airports";

  public static $validation_rules = [
    "airport_name" => "required|between:1,10",
  ];

  public static $validation_messages = [
    "brand_name.required" => "空港名は必ず入力してください。",
    "brand_name.between" => ":min以上:max以内の空港名を入力してください。",
  ];


  public function flight(){
    return $this->hasMany('App\Model\Flight','mtb_airport_id');

  }

  public function city(){
    return $this->belongsTo('App\Model\Master\City','mtb_city_id');

  }
}
