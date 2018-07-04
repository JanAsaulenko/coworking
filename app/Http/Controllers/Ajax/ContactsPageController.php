<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 11/8/2017
 * Time: 11:08 PM
 */

namespace App\Http\Controllers\Ajax;
use App\Http\Controllers\Controller;

use App\Place;


class ContactsPageController extends Controller
{
    public function getCoordinates()
    {
        $places = Place::all()->where('longitude','!=', null);


        $geoJsonFeatures = array_map(function($place) {
            return
                [
                    'lon' => number_format($place->longitude,7),
                    'lat' => number_format($place->latitude,7),
                    'address' => $place->address
                ];
        },$places->all());
        return $geoJsonFeatures;
    }
}
