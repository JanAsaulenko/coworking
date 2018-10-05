<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;


class v2CityController extends Controller
{
    public function getAllCities()
    {
        $cities = City::all();
        return response()->json($cities,200);
    }
}
