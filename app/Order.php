<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Reservation;
use App\Status;
use Validator;

class Order extends Model
{
    protected $fillable = [
        'reservation_id', 'status_id'
    ];
    public function reservation(){
        return $this->belongsTo('App\Reservation');
    }

    public function status(){
        return $this->belongsTo('App\Status');
    }

    public function orderHistory(){
        return $this->hasMany('App\OrderHistory'); 
    }

    // public function isValid($order){
    //     $validatorOrder = Validator::make($order, [
    //         'reservation_id' => 'required|numeric|exists:reservation,id', 
    //         'status_id' => 'required|numeric|exists:status,id',
    //     ]);
    //     if ($validatorOrder->fails()){
    //         return false;
    //     }
    //     else{
    //         return true;
    //     } 
    // }

    // public function fillTest($order){
    //     $this->reservation_id = $order['reservation_id'];
    //     $this->status_id=$order['status_id'];
        
    //     return $this;
    // }
}