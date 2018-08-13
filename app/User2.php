<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order2;
class User2 extends Model
{
    protected $table = 'usersv2';
    public function order(){
        $this->hasMany("App\Order2", 'user_id','id');
    }
}
