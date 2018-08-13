<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Space extends Model
{
    public function spaces()
    {
        return $this->belongsTo('App\Place','id');
    }
}
