<?php

namespace App\Http\Controllers;

use App\City;
use App\Place;
use App\Reservation;
use Illuminate\Http\Request;


class v2MainPageController extends Controller
{
    public function index(){
//        dd(Place::find(1)->spaces);
//        dd( $this->getCity() );



    }

    public function getCity(){
        return  City::all()->map(function($city,$key){
            return [
                'name' => $city['name'],
                'id' => $city['id'],
                'places' => ($city['places']->map(function ($place,$key){
                    return [
                        'address' => $place['address'],
                        'id' => $place['id'],
                        'spaces' => $place['spaces']->map(function ($space,$key){
                            return [ 'name' => $space['name'],
                                'id' => $space['id']
                            ];
                        })->all()
                    ];
                }))->all()
            ];
        })->all();
    }
}
