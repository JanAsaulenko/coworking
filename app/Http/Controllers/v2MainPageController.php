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
        return response()->json(  City::all()->map(function($city,$key){
            return [
                'city_name' => $city['name'],
                'id' => $city['id'],
                'places' => ($city['places']->map(function ($place,$key){
                    return [
                        'address' => $place['address'],
                        'latitude' => $place['latitude'],
                        'longitude' => $place['longitude'],
                        'id' => $place['id'],
                        'spaces' => $place['spaces']->map(function ($space,$key){
                            return [ 'name' => $space['name'],
                                'id' => $space['id']
                            ];
                        })->all()
                    ];
                }))->all()
            ];
        })->all() );
    }
}
