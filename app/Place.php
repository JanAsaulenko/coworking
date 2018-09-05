<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
use DateTime;

class Place extends Model
{
    public function spaces(){
        return $this->hasMany('App\Space','place_id', 'id');
    }

    protected $fillable = [
	   'city_id', 'address', 'name', 'start_time','end_time','number_of_seatplace'
	   ];

	public function isValid($place){
		$validatorPlace = Validator::make($place,  [
			'city_id' => 'required|max:255',
			'address' =>     'required|max:255',
			'start_time' => ['required', 'regex:^(([0-1][0-9]|2[0-3]):[0-5][0-9]?)$^'],
			'end_time' => ['required', 'regex:^(([0-1][0-9]|2[0-3]):[0-5][0-9]?)$^'],
            'name' => 'max:255'
        ]);

		if ($validatorPlace->fails()){
            return false;
        }
		return true;
	}

    public function city(){
        return $this->belongsTo('App\City','city_id','id');
    }

    public function reservations(){
        return $this->hasManyThrough('App\Reservation','App\Space');
    }

    public function countOfSeatPlaces(){
        return $this->spaces()->sum('number_of_seats');
    }

//
//    public function users(){
//        return $this->belongsToMany('App\User', 'workers', 'place_id', 'user_id');
//    }
//
//    public function roles(){
//        return $this->belongsToMany('App\Role', 'workers', 'place_id', 'role_id');
//    }
//
//    public function workers(){
//        return $this->hasMany('App\Worker');
//    }
//
//    public function images(){
//        return $this->hasMany('App\Image');
//    }


	public function getCityName(){
		return $this->city->name;
	}
/// We comment this 2018.08.11
//	public function spaces(){
//
//        return $this->hasMany('App\NamePlace');
//    }

	public function getPlaceName()
	{
		if ( $this->name) {
			return $this->name;
		}
		else {
				return 'No name';
		}
	}

}
