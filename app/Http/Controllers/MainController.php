<?php

namespace App\Http\Controllers;

use App\Place;
use Illuminate\Http\Request;
use App\MainPageConfig;
use App\City;
use App\Price;
use App\DiscountType;
use App\NamePlace;

use App\Lib\Gallery;

class MainController extends Controller
{   const COUNT_PICTURES = 4;
    public function index()
    {
		$cities = City::orderBy('name', 'asc')->get();

        $prices = Price::orderBy('amount', 'asc')->get();
        $places = Place::orderBy('address', 'asc')->get();
		$discountTypes = DiscountType::orderBy('id', 'asc')->get();
        $config = new MainPageConfig();//???

        $gallery=new Gallery();
        $pictures=$gallery->getNamePictures(self::COUNT_PICTURES);

        return view('View_main',['config'=> $config, 'prices'=> $prices, 'cities'=> $cities, 'discountTypes'=>$discountTypes, 'places' => $places,'pictures'=>$pictures]);
    }

    public function contacts(){
            return view('contacts');
    }


    public function place(){
        $place_name = NamePlace::orderBy('name','asc')->get();
        $cities_names = City::orderBy('name', 'asc')->get();
        $stay = Place::orderBy('address','asc')->get();
        return view('View_place', ['cities_names' => $cities_names,'stay'=> $stay,'place_name'=> $place_name]);

    }
    public function getPlaces(Request $request)
    {
        $id_req = $request->id;
        $start_date = $request->start_date;

        $places = Place::all()->where('id_city', $id_req);
        return array_map(function($place){

            $completelyReservedDays = array();
            $completelyReservedDays[] = '12.07.2019';
            $completelyReservedDays[] = '14.08.2019';
            return array ('id' => $place->id, 'address' => $place->address,'completelyReservedDays' => $completelyReservedDays);
            },$places->all());
    }


    public function getSpaces(Request $request){
        $id_req = $request->id;
        $start_date = $request->start_date;

        $name_places = NamePlace::all()->where('place_id', $id_req);
        return array_map(function($name_places){

            $completelyReservedDays = array();
            $completelyReservedDays[] = '12.07.2019';
            $completelyReservedDays[] = '14.08.2019';
            return array ('id' => $name_places->id, 'address' => $name_places->name,'completelyReservedDays' => $completelyReservedDays);
        },$name_places->all());
    }


}
