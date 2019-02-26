<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $table = "flights";

    public function comment(){
      return $this->hasMany('App\Model\Comment','flight_id');

    }
<<<<<<< HEAD
    public function mtb_airport(){
=======
    public function mtb_airports(){
>>>>>>> 2dd486619ee5d7c6b73d9b462ec2e382dfb29168
      return $this->belongsTo('App\Model\Msater\Airport','mtb_airport_id');

    }
    public function brand(){
      return $this->belongsTo('App\Model\Brand','brand_id');

    }
}
