<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $table = "flights";

    public static $validation_rules = [
      "brand_id" => "required",
      "flight_number" => "required|between:1,10",
    //  "mtb_start_airport_id" => "required",
    //  "mtb_destination_airport_id" => "required",
      //"start_time" => "required",
      //"destination_time" => "required",

    ];

    public static $validation_messages = [
      "brand_id.required" => "航空会社名を必ず選択してください",
      "flight_number.required" => "便名を必ず入力してください。",
      "flight_number.between" => ":min以上:max以内の便名を入力してください。",
    //  "mtb_start_airport_id.required" => "空港を必ず選択してください",
    //  "mtb_destination_airport_id" => "空港を必ず選択してください",

    ];

    public function comments(){
      return $this->hasMany('App\Model\Comment','flight_id');

    }

    public function start_airport(){
      return $this->belongsTo('App\Model\Master\Airport','mtb_start_airport_id');

    }
    public function destination_airport(){
      return $this->belongsTo('App\Model\Master\Airport','mtb_destination_airport_id');

    }
    public function brand(){
      return $this->belongsTo('App\Model\Brand','brand_id');

    }
}
