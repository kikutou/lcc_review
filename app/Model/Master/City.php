<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = "mtb_cities";

    public function mtb_airports(){
      return $this->hasMany('App\Model\Master\Airport','mtb_city_id');

    }
    public function mtb_countries(){
      return $this->belongsTo('App\Model\Master\Cuntry');

    }


}
