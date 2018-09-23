<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix'=>'/v2'], function () {
    Route::get('/getallprices','v2PriceController@getAllPrices');
    Route::get('/getallplaces','v2PlaceController@getAllPlaces');

    Route::get('/getplaces','v2ReservationController@getPlaces');
    Route::get('/getspaces','v2ReservationController@getSpaces');
    Route::get('/chooseplace','v2ReservationController@choosePlace');
    Route::get('/choosespace','v2ReservationController@chooseSpace');
    Route::get('/showreserve','v2ReservationController@showReserve');

});


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');
