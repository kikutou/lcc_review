<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
  protected $table = "comments";
  //connect user
  public function user(){
    return $this->belongsTo('App\Model\User');
  }
  //connect brands
  public function brand(){
    return $this->belongsTo('App\Model\Brand');
  }
  //connect flights
  public function flight(){
    return $this->belongsTo('App\Model\Flight');
  }
  //connect status
  public function inspect_status(){
    return $this->belongsTo('App\Model\Master\InspectStatus','mtb_inspect_status_id');
  }
  //SoftDeletes
  use SoftDeletes;

  /**
  * The attributes that should be mutated to dates.
  *
  * @var array
  */
  protected $dates = ['deleted_at'];

  //Validator
  public static $validation_rules = [

    "comment" => "between:0,500"
  ];

  public static $validation_messages = [

    "comment.between:0,500" => "五百字以内のコメントを書いてください"
  ];


}
