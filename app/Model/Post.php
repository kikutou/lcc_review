<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts";

    //connect category
    public function mtb_category(){
      return $this->belongsTo('App\Model\Master\Category');
    }

    //connect admin
    public function admin(){
      return $this->belongsTo('App\Model\Admin');
    }

    //connect brand
    public function brand(){
      return $this->belongsTo('App\Model\Brand');
    }
}
