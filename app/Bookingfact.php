<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
use App\Lib\Occupancy;

class Bookingfact extends Model
{
	public $errorMessages;
	protected $fillable = ['name', 'email', 'phone', 'space_id', 'date_from','date_to','time_from','time_to','json_details','uuid'];


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
//			'phone' => ['regex:^([0-9][0-9]-[0-9][0-9][0-9]-[0-9][0-9][0-9]-[0-9][0-9]-[0-9][0-9]?)$^'], // todo (author Panda) phone fromat ????
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


    public function getUuid()
    {
        $dataString = '';
        $dataString .= $this->name
            . $this->date_from
            . $this->time_from
            . $this->date_to
            . $this->time_to;
        $hash = strtoupper(md5($this->getRandomString($dataString)));
        $hyphen = chr(45);
        $uuid = substr($hash, 0, 8) . $hyphen
            . substr($hash, 8, 4) . $hyphen
            . substr($hash, 12, 4) . $hyphen
            . substr($hash, 16, 4) . $hyphen
            . substr($hash, 20, 12);
        $this->uuid = $uuid;
        return 0;
    }

    private function getRandomString($dataString)
    {
        $randomString = '';
        for ($i = 0; $i < strlen($dataString) - 1; $i++) {
            $randomString .= $dataString[rand(0, strlen($dataString) - 1)];
        }
        return $randomString;
    }

    public function getErrorsMessages()
    {
        return $this->errorMessages;
    }

    public function createReservation(){
        $details = json_decode($this->json_details);
        $result = array();

        foreach ($details as $reservDate ){
            foreach ( $reservDate->seat_numbers as $seat_number ){
                $reservation = new Reservation();
                $reservation->space_id = $this->space_id;
                $reservation->status_id = 1;
                $reservation->seat_number = $seat_number;
                $reservation->bookingfact_id = $this->id;

                $reservation->date_from = $reservDate->date;
                $reservation->date_to = $reservDate->date;
                $reservation->time_from = null;
                $reservation->time_to = null;
                $reservation->save();
            }
        }
        return true;
    }

    public function confirm(){
        $this->bookingfact_statuses_id = 2;
        $this->save();
        $reservations = $this->reservations()->get();
        foreach ( $reservations as $reservation ){
            $reservation->confirm();
        }
    }

    public function cancell(){
        $this->bookingfact_statuses_id = 3;
        $this->save();
        $reservations = $this->reservations()->get();
        foreach ( $reservations as $reservation ){
            $reservation->cancell();
        }
    }


}
