<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostsBrands extends Model
{
  use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    //connect post
    public function post(){
      return $this->belongsTo('App\Model\Post');
    }
    //connect brand
    public function brand(){
      return $this->belongsTo('App\Model\Brand');
    }

}
