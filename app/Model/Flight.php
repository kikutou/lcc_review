<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $table = "flights";

    public function comment(){
      return $this->hasMany('App\Model\Comment','flight_id');

    }

    public function mtb_airport(){
      return $this->belongsTo('App\Model\Msater\Airport','mtb_airport_id');

    }
    public function brand(){
      return $this->belongsTo('App\Model\Brand','brand_id');

    }
}
