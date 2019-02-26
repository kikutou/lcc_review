<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class InspectStatus extends Model
{
    protected $table = "mtb_inspect_statuses";
    return $this->belongsToMany('App\Model\Comment');
}
