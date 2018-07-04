<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function place(){
        return $this->belongsTo('App\Place');
    }

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function orderHistory(){
        return $this->hasMany('App\OrderHistory');
    }

    public function savePermission($worker){
        $this->user_id = $worker['user'];
        $this->place_id = $worker['place'];
        $this->role_id = $worker['role'];
		
		return $this;
	}
}
