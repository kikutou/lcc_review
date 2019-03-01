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
//Status
  public function inspect_status($read_by_admin_at){
    $status = null;
    if (is_null($read_by_admin_at)){
      $status = "未審査";
    }else {
      $status = "審査済み";
    }
    return $status;
  }

//average_score
  public function average_score($service,$clean,$food,$seat,$entertainment,$cost_performance){
    $totalscore = $service+$clean+$food+$seat+$entertainment+$cost_performance;
    $score = $totalscore/6;
    $average_score = round($score,1);
    return $average_score;
  }

//show average_score with star
  public  function star($average_score){
    if (strpos($average_score,".")) {

      for ($x=1; $x<=$average_score; $x++) {
        echo "<i class=\"fa fa-star\"></i>";
      }
      echo "<i class=\"fa fa-star-half-o\"></i>";
    }else {
      for ($x=1; $x<=$average_score; $x++) {
        echo "<i class=\"fa fa-star\"></i>";
      }
    }
  }



}
