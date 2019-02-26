<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
  protected $table = "user_details";
    //conect with table users
    public function user(){
      return $this->belongsTo('App\Model\User');
    }
    //conect with table address
    public function mtb_address_prefecture(){
      return this->belongsTo('App\Model\Master\AddressPrefecture','mtb_address_prefecture_id');
    }
}
