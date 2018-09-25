<?php

namespace App\Http\Controllers;

use App\Bookingfact;
use BaconQrCode\Encoder\QrCode;
use http\Env\Response;
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

class ReservationController extends Controller
{
    public function index()
    {
        $cities = City::orderBy('name', 'asc')->get();
        return view('View_reservation', ['cities' => $cities]);
    }

    public function getPlaces(Request $request)
    {
        $id_req = $request->id;
        $places = Place::all()->where('city_id', $id_req);
        return array_map(function ($place) {
            return array('id' => $place->id, 'text' => $place->address);
        }, $places->all());
    }


    public function getSpaces(Request $request)
    {
        $id_req = $request->id;
        $name_places = Space::all()->where('place_id', $id_req);
        return array_map(function ($name_places) {
            return array('id' => $name_places->id, 'text' => $name_places->name_space);
        }, $name_places->all());
    }

    public function choosePlace(Request $request)
    {
        $completelyReservedDays = Occupancy::getCompletelyReservedDaysByPlace($request->id);
        return array('completelyReservedDays' => $completelyReservedDays);
    }

    /**
     * @param Request $request
     * @return array
     */
    public function chooseSpace(Request $request)
    {
        $space_id = $request->id;
        $spaces = Space::all()->where('id', $space_id);
        $completelyReservedDays = Occupancy::getCompletelyReservedDaysBySpace($space_id);
        return array('completelyReservedDays' => $completelyReservedDays, 'spaces' => $spaces);
    }


    public function showReserve(Request $request)
    {
        $space_id = $request->id;
        $data = $request->date;
        $price = Price::all();
        $reservedSeats = Occupancy::getReservedSeatPlace($space_id, $data);
        return array('reservedSeats' => $reservedSeats, 'price' => $price);
    }


    public function reserveSeats(Request $request)
    {
        $requestArguments = $request->all();

        $bookingfact = new Bookingfact();
        $details = array();
        $details[] = [
            "date" => $requestArguments['date']['dateFrom'],
            "time_from" => Space::find($requestArguments['date']['spaceId'])->place->start_time,
            "time_to" => Space::find($requestArguments['date']['spaceId'])->place->end_time,
            'seat_numbers' => $requestArguments['date']['reserveSeetsArray']
        ];
        $booking['name'] = $requestArguments['date']['userInfo']['name'];
        $booking['email'] = $requestArguments['date']['userInfo']['email'];
        $booking['phone'] = $requestArguments['date']['userInfo']['telephone'];
        $booking['space_id'] = $requestArguments['date']['spaceId'];
        $booking['date_from'] = $requestArguments['date']['dateFrom'];
        $booking['date_to'] = $requestArguments['date']['dateFrom']; /// todo (author Panda) I expect an adequate request

        $booking['time_from'] =  Space::find($requestArguments['date']['spaceId'])->place->start_time;
        $booking['time_to'] =  Space::find($requestArguments['date']['spaceId'])->place->end_time;

        $booking['bookingfact_statuses_id'] = 1; // Booking not confirm
        $booking['json_details'] = json_encode($details);

//        return json_decode( $booking['json_details'],true )[0]['date'];
        if($bookingfact->isValid($booking)){
            $bookingfact->fill($booking);
            $bookingfact->getUuid();
            $bookingfact->save();
            $bookingfact->createReservation();// Create and save mas of reservation with data from bookingfact

            return response()->json(["orderUrl" => action('OrderController@show', $bookingfact->uuid)],200);
        }else{
            return response()->json([ "errors" => $bookingfact->errorMessages],400);
        }

    }
}

