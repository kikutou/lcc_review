<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    protected $table = "posts";
    //connect category
    public function category(){
      return $this->belongsTo('App\Model\Master\Category','mtb_category_id');
    }

    //connect admin
    public function admin(){
      return $this->belongsTo('App\Model\Admin');
    }

    //connect brand
    public function brand(){
      return $this->belongsTo('App\Model\Brand');
    }

    use SoftDeletes;

      /**
       * The attributes that should be mutated to dates.
       *
       * @var array
       */
      protected $dates = ['deleted_at'];

}
