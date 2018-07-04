<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NamePlace extends Model
{
    public function place(){
        return $this->belongsTo('App\Place');
    }
}
