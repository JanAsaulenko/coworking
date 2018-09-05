<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Validation\Validator;

class City extends Model
{

	public function places(){
		return $this->hasMany('App\Place', 'city_id','id');
	}

	public function spaces(){
	    return $this->hasManyThrough('App\Space','App\Place');
    }

//	public function isValid($city){
//		$validatorCity = Validator::make($city,  [
//			'name' => 'required|max:255'
//        ]);
//
//		if ($validatorCity->fails()){
//            return false;
//        }
//		return true;
//	}

}
