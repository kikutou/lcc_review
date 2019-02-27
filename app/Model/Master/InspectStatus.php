<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class InspectStatus extends Model
{
    protected $table = "mtb_inspect_statuses";

    //conect comments
    public function comment(){
        return $this->hasMany('App\Model\Comment','mtb_inspect_status_id');
    }
}
