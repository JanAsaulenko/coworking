<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Bookingfact extends Model
{
	public $errorMessages;
	protected $fillable = ['name', 'email', 'phone', 'id_place'];

    public function reservations()
    {
        return $this->hasMany('App\Reservation', 'bookingfacts_id');
    }

	public function place(){
		return $this->hasOne('App\Place', 'id', 'id_place');
	}

	public function isValid($bookingfact){
		$validatorBookingfact = Validator::make($bookingfact, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255',
			'phone' => ['regex:^([0-9][0-9]-[0-9][0-9][0-9]-[0-9][0-9][0-9]-[0-9][0-9]-[0-9][0-9]?)$^'],
			'id_place' => 'required'
			]);
		$this->errorMessages = $validatorBookingfact->getMessageBag()->all();
		if ($validatorBookingfact->fails()){
			return false;
			}
		else{
            $this->saveInDatabase($bookingfact);
        	return true;
		}
    }
        private function saveInDatabase($bookingfact){
            $newBookingFact = new Bookingfact($bookingfact);
        	$newBookingFact->save();
        }
        public function getErrorsMessages()
        {
            return $this->errorMessages;
        }

}
