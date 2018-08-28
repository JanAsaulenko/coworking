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
        $details[ $requestArguments['date']['dateFrom'] ] = [
            "time_from" => null,
            "time_to" => null,
            'seat_numbers' => $requestArguments['date']['reserveSeetsArray']
        ];
        $booking['name'] = $requestArguments['date']['userInfo']['name'];
        $booking['email'] = $requestArguments['date']['userInfo']['email'];
        $booking['phone'] = $requestArguments['date']['userInfo']['telephone'];
        $booking['space_id'] = $requestArguments['date']['spaceId'];
        $booking['date_from'] = $requestArguments['date']['dateFrom'];
        $booking['date_to'] = $requestArguments['date']['dateFrom']; /// todo (author Panda) I expect an adequate request
        $booking['bookingfact_statuses_id'] = 1; // Booking not confirm
        $booking['json_details'] = json_encode($details);

        if($bookingfact->isValid($booking)){
            $bookingfact->fill($booking);
            $bookingfact->getUuid();
            $bookingfact->save();
        }
        $result = ["bokingUrl" => "/booking/ID/hardkon/shit/get", "errors" => $bookingfact->errorMessages,"uuid" => $bookingfact->uuid];
//        dd($result);
        return array($result);
    }
}

//    public function index(Request $request)
//    {
//        $firstForm = $request->except(['_token', 'OK']);
//        $firstForm['townName'] = City::where('id', $firstForm['town'])->first()['name'];
//        $discountTypes = DiscountType::orderBy('id', 'asc')->get();
//        $newReservation = new Reservation();
//        $reservations = $newReservation->preparationsArrayFirstForm($firstForm);
//        $validationError = [0];
//        $firstForm['placeName'] = Place::find($firstForm['place'])->address;
//        $errorMsg = Occupancy::GetOccupancy($firstForm['place'], $firstForm['fromdate'], $firstForm['todate'], $firstForm['places']);
//        return view('View_reservation', [
//            'firstForm'       => $firstForm,
//            'discountTypes'   => $discountTypes,
//            'reservations'    => $reservations,
//            'validationError' => $validationError,
//            'errorMsg'        => $errorMsg]);
//    }


//
//
//
//
//
//
//
//


//    public function showOrderGet($guid)
//    {
//        $order = Reservation::where('guid', $guid)->first();
//        $date_from = DateTime::createFromFormat('Y-m-d', $order->date_from);
//        $time_from = DateTime::createFromFormat('H:i:s', $order->time_from);
//        $date_to = DateTime::createFromFormat('Y-m-d', $order->date_to);
//        $time_to = DateTime::createFromFormat('H:i:s', $order->time_to);
//        $dateTime = [
//            'date_from' => $date_from->format('d.m.Y'),
//            'time_from' => $time_from->format('H:i'),
//            'date_to'   => $date_to->format('d.m.Y'),
//            'time_to'   => $time_to->format('H:i'),
//        ];
//
//
//        $discountTypes = DiscountType::orderBy('id', 'asc')->get();
//
//        return view('View_orderGet', ['arr' => $order->toArray(), 'discountTypes' => $discountTypes, 'dateTime' => $dateTime]);
//    }
//}
