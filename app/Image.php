<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Image extends Model
{
	public function isValid($image){
		$validatorImage = Validator::make($image,  [
			'place_id' => 'required|max:255',
			'image' => 'required|image|mimes:jpeg, jpg, png, gif, svg|max:10240',
        ]);
		if ($validatorImage->fails()){
            return false;
        }
		return true;
	}

	public function place(){
        return $this->belongsTo('App\Place');
    }
}