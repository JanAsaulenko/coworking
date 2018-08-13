<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User2;
use App\Reservation2;
class Order2 extends Model
{
    protected $table = 'order2';
    public function user(){
      return   $this->belongsTo('App\User2','id','id');
    }
    public function reservation(){
     return    $this->hasMany("App\Reservation2",'id','order2_id');
    }
}
