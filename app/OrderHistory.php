<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{
    public function order(){
        return $this->hasOne('App\Order');
    }

    public function worker(){
        return $this->belongsTo('App\Worker');
    }
}