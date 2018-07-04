<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public function fillTest($worker){
        $this->user_id = $worker['user'];
        $this->place_id = $worker['place'];
        $this->role_id = $worker['role'];
		
		return $this;
	}
}
