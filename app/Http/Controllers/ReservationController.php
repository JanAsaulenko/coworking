<?php

namespace App\Http\Controllers;

use BaconQrCode\Encoder\QrCode;
use Illuminate\Http\Request;
use App\City;
use App\Place;
use App\DiscountType;
use App\MainPageConfig;
use App\Reservation;
use Illuminate\Support\Facades\View;
use DateTime;
use App\Lib\Occupancy;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        $firstForm = $request->except(['_token', 'OK']);
        //dd($firstForm);
        $firstForm['townName'] = City::where('id', $firstForm['town'])->first()['name'];
        $discountTypes = DiscountType::orderBy('id', 'asc')->get();
        $newReservation = new Reservation();
        $reservations = $newReservation->preparationsArrayFirstForm($firstForm);
        $validationError = [0];
        $firstForm['placeName'] = Place::find($firstForm['place'])->address;
        $errorMsg = Occupancy::GetOccupancy($firstForm['place'], $firstForm['fromdate'], $firstForm['todate'], $firstForm['places']);
        return view('View_reservation', [
            'firstForm'       => $firstForm,
            'discountTypes'   => $discountTypes,
            'reservations'    => $reservations,
            'validationError' => $validationError,
            'errorMsg'        => $errorMsg]);
    }

    public function getplace(Request $request)
    {
        $id_req = $request->getContent();
        $places = Place::all()->where('id_city', $id_req);

        return $places;
    }

    public function showOrderGet($guid)
    {
        $order = Reservation::where('guid', $guid)->first();
        $date_from = DateTime::createFromFormat('Y-m-d', $order->date_from);
        $time_from = DateTime::createFromFormat('H:i:s', $order->time_from);
        $date_to = DateTime::createFromFormat('Y-m-d', $order->date_to);
        $time_to = DateTime::createFromFormat('H:i:s', $order->time_to);
        $dateTime = [
            'date_from' => $date_from->format('d.m.Y'),
            'time_from' => $time_from->format('H:i'),
            'date_to'   => $date_to->format('d.m.Y'),
            'time_to'   => $time_to->format('H:i'),
        ];


        $discountTypes = DiscountType::orderBy('id', 'asc')->get();

        return view('View_orderGet', ['arr' => $order->toArray(), 'discountTypes' => $discountTypes, 'dateTime' => $dateTime]);
    }
}
