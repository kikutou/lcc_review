<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserDetail extends Model
{
  protected $table = "user_details";
    //conect with table users
    public function user(){
      return $this->belongsTo('App\Model\User')->withDefault();
    }
    //conect with table address
    public function address_prefecture(){
      return $this->belongsTo('App\Model\Master\AddressPrefecture','mtb_address_prefecture_id')->withDefault();
    }

    use SoftDeletes;

      /**
       * The attributes that should be mutated to dates.
       *
       * @var array
       */
      protected $dates = ['deleted_at'];

}
