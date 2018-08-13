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

use App\Lib\Gallery;

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
        $places = Place::all()->where('id_city', $id_req);
        return array_map(function ($place) {
            return array('id' => $place->id, 'text' => $place->address);
        }, $places->all());
    }


    public function getSpaces(Request $request)
    {
        $id_req = $request->id;
        $name_places = Space::all()->where('id_place', $id_req);
        return array_map(function ($name_places) {
            return array('id' => $name_places->id, 'text' => $name_places->name_space);
        }, $name_places->all());
    }

    public function choosePlace(Request $request)
    {
        $space_id = $request->id;
        if ($space_id == '2') {
            $completelyReservedDays = array();
            $completelyReservedDays[] = '2018-08-15';
            $completelyReservedDays[] = "2018-08-16";
            $completelyReservedDays[] = "2018-08-27";
            return array('completelyReservedDays' => $completelyReservedDays);
        } else {
            $completelyReservedDays = array();
            $completelyReservedDays[] = '2018-08-13';
            $completelyReservedDays[] = "2018-08-30";
            return array('completelyReservedDays' => $completelyReservedDays);
        }
    }

    /**
     * @param Request $request
     * @return array
     */
    public function chooseSpace(Request $request)
    {
        $space_id = $request->id;
        $spaces = Space::all()->where('id', $space_id);

        $completelyReservedDays = array();
        $completelyReservedDays[] = '2018-08-15';
        $completelyReservedDays[] = "2018-08-16";
        return array('completelyReservedDays' => $completelyReservedDays, 'spaces' => $spaces);
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
//    public function getplace(Request $request)
//    {
//
//        $id_req = $request->getContent();
//        $places = Place::all()->where('id_city', $id_req);
//        return $places;
//    }
//public function getspace(Request $request)
//{
//$id_req = $request->getContent();
//return $id_req;
//}
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
