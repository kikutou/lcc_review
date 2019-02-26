<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = "mtb_cities";

    public function airport(){
      return $this->hasMany('App\Model\Master\Airport','mtb_city_id');

    }
    public function country()
    {
      return $this->belongsTo('App\Model\Master\Country', "mtb_country_id");
    }


}
