<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class AddressPrefecture extends Model
{
  protected $table = "mtb_address_prefectures";

  //connect user detail
  public function user_detail(){
    return $this->hasMany('App\Model\UserDetail','mtb_address_prefecture_id');
  }
}
