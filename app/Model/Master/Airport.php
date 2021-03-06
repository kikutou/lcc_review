<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
  use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];



    public function start_flight(){
      return $this->hasMany('App\Model\Flight','mtb_start_airport_id');

    }
    public function destination_flight(){
      return $this->hasMany('App\Model\Flight','mtb_destination_airport_id');
      }

    public function city(){
    return $this->belongsTo('App\Model\Master\City','mtb_city_id');
    }


}
