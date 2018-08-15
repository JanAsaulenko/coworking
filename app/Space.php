<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Space extends Model
{
    public function place()
    {
        return $this->belongsTo('App\Place','place_id','id');
    }

    public function reservations(){
        return $this->hasMany('App\Reservation','space_id','id');
    }

}
