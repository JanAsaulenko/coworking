<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation2 extends Model
{
    protected $table = 'reservation2';
    public function order(){
     return    $this->belongsTo("App\Order2",'order2_id','id');
    }
}
