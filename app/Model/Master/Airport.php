<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
  protected $table = "mtb_airports";


  public function flight(){
    return $this->hasMany('App\Model\Flight','mtb_airport_id');

  }
  public function city(){
    return $this->belongsTo('App\Model\Master\City','mtb_city_id');

  }
}
