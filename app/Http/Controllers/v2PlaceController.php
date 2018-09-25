<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;

class v2PlaceController extends Controller{
    public function getAllPlaces(){
        $places  = Place::all();
        $placesArr = array();
        foreach ($places as $place){
            $placesArr[]= [
                $place
            ];
        }
        return response()->json($places,200);
    }
}
