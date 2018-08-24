<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
class Space extends Model
{
    protected $fillable = [
        'place_id','number_of_seatplace','name_space'
    ];

    public function place()
    {
        return $this->belongsTo('App\Place','place_id','id');
    }

    public function reservations(){
        return $this->hasMany('App\Reservation','space_id','id');
    }

    public function getCity(){// return null or Model City....
        $place = $this->place;
        if($place){
            $city = $place->city;
            if($city){
                return $city;
            }
        }
        return null;
    }


    public function isValid($space){
        $validatorPlace = Validator::make($space,  [
//            'place_id' => 'required|max:255',
            'number_of_seats' => 'required|max:255',
            'name_space' => 'max:255'
        ]);

        if ($validatorPlace->fails()){
            return false;
        }
        return true;
    }






}
