<?php

namespace App\Http\Controllers;

use App\Bookingfact;
use App\BookingfactStatus;
use App\City;
use App\Place;
use App\Reservation;
use Illuminate\Http\Request;


class v2MainPageController extends Controller
{
    public function index(){
        return '<h1>Empty Page</h1>';
    }

    public function test(){
//        dd(Place::find(1)->spaces);

        dd( $this->getAllPlaces() );
        return 'test';
    }

    public function getAllPlaces(){
        $allPlaces = Place::all();
        $arrPlaces = array();
        foreach ($allPlaces as  $place ){
            $arrPlaces[]= [
                'name'=>$place->name,
                'address'=>$place->address,
                'longitude'=>$place->longitude,
                'latitude'=>$place->latitude
            ];
        }
        return response()->json($arrPlaces,200);
    }
}
