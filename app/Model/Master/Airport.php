<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
  protected $table = "mtb_airports";


  public function flight(){
    return $this->hasMany('App\Model\Flight','mtb_airport_id');

  }
<<<<<<< HEAD
  public function city(){
=======
  public function mtb_cities(){
>>>>>>> 2dd486619ee5d7c6b73d9b462ec2e382dfb29168
    return $this->belongsTo('App\Model\Master\City','mtb_city_id');

  }
}
