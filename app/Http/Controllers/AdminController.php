<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Place;
use App\MainPageConfig;

class AdminController extends Controller
{
    public function index()
    {

		$cities = City::all();
		$places = Place::all();

		$config = new MainPageConfig();
		
		return view('admin_main', ['config'=> new MainPageConfig(), 'cities'=>$cities]);
    }
}