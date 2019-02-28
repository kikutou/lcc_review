<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class UserStatus extends Model
{

  protected $table = "mtb_user_statuses";

  //conect user
  public function users(){
    return $this->hasMany('App\Model\User',"mtb_user_status_id");
  }
}
