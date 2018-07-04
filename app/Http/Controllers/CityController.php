<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\City;

class CityController extends Controller
{
    public function store(Request $request)
    {
        $city = new City;

        if ($city->isValid($request->all())){
            $city->save();
        }
        else{
            echo ("Error");
        }
       return redirect()->route('place.create');
    }
}
