<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class City extends Model
{
	public function printCityNames(){
		foreach($cities as $city){
			echo $city->id;
			echo $city->name;
		}
	}

	public function places(){
		return $this->hasMany('App\Place', 'id_city');
	}

	public function isValid($city){
		$validatorCity = Validator::make($city,  [
			'name' => 'required|max:255'
        ]);

		if ($validatorCity->fails()){
            return false;
        }
		return true;
	}

}
