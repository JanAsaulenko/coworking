<?php

namespace App\Http\Controllers;

use App\Bookingfact;
use BaconQrCode\Encoder\QrCode;
use Illuminate\Http\Request;
use App\City;
use App\Place;
use App\Space;
use App\DiscountType;
use App\MainPageConfig;
use App\Reservation;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use DateTime;
use App\Lib\Occupancy;
use App\Price;
use App\NamePlace;

use App\Lib\Gallery;
use SimpleSoftwareIO\QrCode\DataTypes\Email;
use Symfony\Component\Routing\Route;

class v2ReservationController extends Controller
{
    public function index()
    {
//        $cities = City::orderBy('name', 'asc')->get();
//        return view('View_reservation', ['cities' => $cities]);
    }

    public function getPlaces(Request $request)
    {
        $id_req = $request->city_id;
        $city = City::findorfail($id_req);
        $places = $city->places;
        $data =  array_map(function ($place) {
            return array('palce_id' => $place->id, 'address' => $place->address);
            }, $places->all());
        return response()->json( $data , 200 );
    }


    public function getSpaces(Request $request)
    {
        $place = Place::findorfail($request->place_id);
        $spaces = $place->spaces;
        $data = array_map(function ($space) {
            return array('space_id' => $space->id, 'name' => $space->name_space);
        }, $spaces->all());
        return response()->json($data,200);
    }


    public function choosePlace(Request $request)
    {
        $place = Place::findorfail($request->place_id);
        $completelyReservedDays = Occupancy::getCompletelyReservedDaysByPlace($place->id);
        $data =  array('completelyReservedDays' => $completelyReservedDays);
        return response()->json($data,200);
    }


    public function chooseSpace(Request $request)
    {
        $space = Space::findorfail($request->space_id);
        $completelyReservedDays = Occupancy::getCompletelyReservedDaysBySpace($space->id);
        $data = array('completelyReservedDays' => $completelyReservedDays, 'space' => $space);
        return response()->json($data,200);
    }


    public function showReserve(Request $request)
    {
        $space = Space::findorfail($request->space_id);
        $date = $request->date;
        $price = Price::all();
        $reservedSeats = Occupancy::getReservedSeatPlace($space->id, $date);
        $data = array('reserved_seats' => $reservedSeats, 'price' => $price);
        return response()->json($data,200);
    }


    public function reserveSeats(Request $request) //todo !!!!!!!!!! Необхыдний стандарт запроса на заказ
    {
        $requestArguments = $request->all();
        $bookingfact = new Bookingfact();
        $details = array();
        $details[] = [
            "date" => $requestArguments['date']['dateFrom'],
            "time_from" => null,
            "time_to" => null,
            'seat_numbers' => $requestArguments['date']['reserveSeetsArray']
        ];
        $booking['name'] = $requestArguments['date']['userInfo']['name'];
        $booking['email'] = $requestArguments['date']['userInfo']['email'];
        $booking['phone'] = $requestArguments['date']['userInfo']['telephone'];
        $booking['space_id'] = $requestArguments['date']['spaceId'];
        $booking['date_from'] = $requestArguments['date']['dateFrom'];
        $booking['date_to'] = $requestArguments['date']['dateFrom']; ///
        $booking['bookingfact_statuses_id'] = 1; // Booking not confirm
        $booking['json_details'] = json_encode($details);

        if($bookingfact->isValid($booking)){
            $bookingfact->fill($booking);
            $bookingfact->getUuid();
            $bookingfact->save();
            $bookingfact->createReservation();// Create and save mas of reservation with data from bookingfact
            return response()->json( ["orderUrl" => action('OrderController@show' , $bookingfact->uuid) ],201);
        }
        return response()->json(["errors" => $bookingfact->errorMessages],400);
    }
}

