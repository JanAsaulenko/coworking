<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function places(){
        return $this->belongsToMany('App\Place', 'workers', 'user_id', 'place_id');
    }

    public function roles(){
        return $this->belongsToMany('App\Role', 'workers', 'user_id', 'role_id');
    }

    public function workers(){
        return $this->hasMany('App\Worker');
    }

    public function isAdmin(){
        return $this->roles->contains(Role::ADMIN);
    }

    public function isManager(){
        return $this->roles->contains(Role::MANAGER);
    }

    public function isOperator(){
        return $this->roles->contains(Role::OPERATOR);
    }
}