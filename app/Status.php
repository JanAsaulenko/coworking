<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Reservation;
use App\Order;

class Status extends Model
{
    public function reservations()
    {
        return $this->belongsToMany('App\Reservation', 'status_id', 'reservation_id');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
