<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\City;
use App\DiscountType;

Route::get('/', ['as' => 'index' ,'uses' => 'MainController@index']);

Route::get('/main/getPlaces', 'MainController@getPlaces');
Route::get('/main/getSpaces',['as'=>'reservation.getspaces','uses'=>'MainController@getSpaces']);

Route::get('/main/getLocationPlace', 'MainController@getPlace');
Route::get('/contacts', 'MainController@contacts');
Route::get('/place', 'MainController@place');
Auth::routes();


Route::get('/operator', 'OperatorController@index')->middleware('auth');

Route::post('/reservation','ReservationController@index');
Route::post('/reservation/getplace', 'ReservationController@getplace');



Route::get('/gallery', 'GalleryController@index');


Route::get('/price', 'PriceController@index2');

Route::post('/send_message', 'SendContactsController@send_form');


Route::post('/booking','BookingController@confirm');
Route::post('/booking/save',['as' => 'booking.save' ,'uses' => 'BookingController@save']);
Route::get('/booking/{guid}', ['as' => 'show.guid' ,'uses' => 'ReservationController@showOrderGet']);
Route::get('/print/{guid}', ['as' => 'print.guid' ,'uses' => 'PrintOrderController@printOrder']);
Route::post('/booking/update/{guid}',['as' => 'update.reservation' ,'uses' =>'UpdateDatabaseReservation@updateDatabase']);
Route::post('/calculate','CalculatorController@calculatePrice');


Route::post('/city','CityController@store');


Route::get('/ajax/getCoordinates', 'Ajax\ContactsPageController@getCoordinates');

Route::get('/admin', ['as'=>'admin','uses' => 'AdminController@index'])->middleware('auth');
Route::group(['prefix'=>'/admin','middleware'=>'auth'], function (){
	Route::resource('place', 'PlaceController');
	Route::resource('price', 'PriceController');
    Route::resource('discount', 'DiscountController');
    Route::resource('permissions', 'PermissionsController');
	Route::resource('image', 'ImageController');
});

Route::get('/getcode', 'DiscountController@show');
Route::get('/checkCode', 'DiscountController@checkCode');


Route::get('/getAllPDF', ['as'=>'getAllPDF','uses' => 'PDFController@getAllPDF']);
Route::get('/getPDF/all', ['as'=>'getPDF.all','uses' => 'PDFController@getAllPDF']);
Route::get('/getPDF', ['as'=>'getPDF','uses' => 'PDFController@getPDF']);

Route::group(['prefix'=>'/admin','middleware'=>'auth'], function () {
    Route::get('/operator', ['as' => 'operator', 'uses' => 'OperatorController@index']);
    Route::post('/operator/showorder', ['as' => 'operator.read', 'uses' => 'OperatorController@read']);
    Route::post('/operator/updateorder', ['as' => 'operator.update', 'uses' => 'OperatorController@update']);
});