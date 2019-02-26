<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";
    //connect user
    public function user(){
      return $this->belongsTo('App\Model\User');
    }
    //connect brands
    public function band(){
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
}
