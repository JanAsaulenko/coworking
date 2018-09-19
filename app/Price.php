<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Validator;

class Price extends Model
{
    public function isValid($price){
		$validatorPrice = Validator::make($price,  [
			'duration' => 'required|max:2555',
			'amount' => 'required|max:255'
        ]);

        if ($validatorPrice->fails()){
            return false;
        }
        return true;
	}

	public function fillTest($price){
        $this->duration = $price['duration'];
		$this->amount=$price['amount'];

		return $this;
	}
}
