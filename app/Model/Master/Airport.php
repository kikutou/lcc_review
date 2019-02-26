<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
  protected $table = "mtb_airports";


  public function flights(){
    return $this->hasMany('App\Model\Flight','mtb_airport_id');

  }
  public function mtb_cities(){
    return $this->belongsTo('App\Model\Master\City','mtb_city_id');

  }
}
