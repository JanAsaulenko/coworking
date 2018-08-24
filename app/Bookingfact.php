<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
use App\Lib\Occupancy;

class Bookingfact extends Model
{
	public $errorMessages;
	protected $fillable = ['name', 'email', 'phone', 'space_id', 'date_from','date_to','json_details'];


    public function reservations()
    {
        return $this->hasMany('App\Reservation', 'bookingfact_id');
    }


	public function place(){
		return $this->hasOne('App\Place', 'id', 'id_place');
	}

	public function isValid($bookingfact){
		$validatorBookingfact = Validator::make($bookingfact, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255',
			'phone' => ['regex:^([0-9][0-9]-[0-9][0-9][0-9]-[0-9][0-9][0-9]-[0-9][0-9]-[0-9][0-9]?)$^'], // todo (author Panda) phone fromat ????
			'space_id' => 'required',
            'date_from' => ['required', 'regex:^([0-9][0-9][0-9][0-9]-[0-9][0-9]-[0-9][0-9])$^'],
            'date_to' => ['required', 'regex:^([0-9][0-9][0-9][0-9]-[0-9][0-9]-[0-9][0-9])$^'],
            'json_details' => 'required'
            ]);
		$this->errorMessages = $validatorBookingfact->getMessageBag()->all();



            $errors = array();
            $reservedDates = json_decode($bookingfact['json_details'],true);
            foreach ($reservedDates as $reserveDate => $reserveValue ){
                $alreadyReservedSeats = Occupancy::getReservedSeatPlace($bookingfact['space_id'],$reserveDate );
                foreach ($reserveValue['seat_numbers'] as $testSeatPlace ){
                    foreach ( $alreadyReservedSeats as  $reservedSeatPlace) {
                        if($testSeatPlace == $reservedSeatPlace ){
                            $errors[] = $reserveDate.' місце №'.$testSeatPlace.' вже заброньовано іншим клієнтом';
                        }
                    }
                }
            }



        if ($validatorBookingfact->fails()||sizeof($errors)){
            $this->errorMessages = array_merge($this->errorMessages,$errors);
            return false;
			}
		else{
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
