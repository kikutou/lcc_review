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
}
