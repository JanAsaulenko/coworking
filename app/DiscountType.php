<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Reservation;

class DiscountType extends Model
{
    public function reservations()
    {
        return $this->hasMany('App\Reservation', 'discount_type_id', 'id');
    }
}
