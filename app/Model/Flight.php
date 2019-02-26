<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $table = "flights";

    public function comments(){
      return $this->hasMany('App\Model\Comment','flight_id');

    }
    public function mtb_airports(){
      return $this->belongsTo('App\Model\Msater\Airport','mtb_airport_id');

    }
    public function brands(){
      return $this->belongsTo('App\Model\Brand');

    }
}
