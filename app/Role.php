<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ADMIN = 1;
    const MANAGER = 2;
    const OPERATOR = 3;
    const GUEST = 4;

    public function users(){
        return $this->belongsToMany('App\User', 'workers', 'role_id', 'user_id');
    }

    public function places(){
        return $this->belongsToMany('App\Place', 'workers', 'role_id', 'place_id');
    }

    public function workers(){
        return $this->hasMany('App\Worker');
    }

    public static function getDefaultRole(){
    	$defaultRoleId = 4;
    	return Role::find($defaultRoleId);
    }
}