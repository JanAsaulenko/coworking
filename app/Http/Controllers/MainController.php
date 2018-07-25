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
        $city_names = City::orderBy('name', 'asc')->get();
        $stay = Place::orderBy('address','asc')->get();
        return view('place', ['city_names' => $city_names,'stay'=> $stay,'place_name'=> $place_name]);

    }
    public function getPlace(Request $request)
    {
        $id_req = $request->city_id;
        $places = Place::all()->where('id_city', $id_req);
        return array_map(function($place){
            return array ('id' => $place->id, 'text' => $place->address);
        },$places->all());
    }

    public function getPlaceLocation(Request $request){
        $id_req = $request->place_id;
        $name_places = NamePlace::all()->where('place_id', $id_req);
        return array_map(function($name_places){
            return array ('id' => $name_places->id, 'text' => $name_places->name);
        },$name_places->all());
    }


}
