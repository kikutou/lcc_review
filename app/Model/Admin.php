<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = "admins";

    //conect posts
    public function posts(){
      return $this->hasMany('App\Model\Post');
    }
}
