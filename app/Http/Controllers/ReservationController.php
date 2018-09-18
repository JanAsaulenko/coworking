<?php

namespace App\Http\Controllers;

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
use PDF;
use App\Lib\Gallery;
use SimpleSoftwareIO\QrCode\DataTypes\Email;

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
    {//вертаэ масыв ошибок якшо вони э??? якшо ъх нема  bookingfact_id
//        $spade_id = $request->id;
//        $date = $request->date;
//        $seat = $request->seat;
dd($request);

//dd($request);
//        $reservation=new Reservation();
//        $order=$reservation->getOrders($guid);
//        $discountTypes = DiscountType::orderBy('id', 'asc')->get();

        $response = array(
            'html' => // Returned HTML
                '<html><head><title>AJAX Loaded Title</title></head><body>It works!</body></html>',

        );
return json_encode($response);
//        return array('reservedSeats'=>'allgoood');
    }
}



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
