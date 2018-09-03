<?php

namespace App\Http\Controllers;

use App\Bookingfact;
use App\Lib\Presenters\BookingFactPresenter;
use App\Lib\Presenters\ReservationPresenter;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function show($uuid){
        $booking = Bookingfact::where('uuid',$uuid)->first();
        if(!$booking){
            return "<h1>Order Not Found</h1>";
        }
        $bookingPresenter = new BookingFactPresenter($booking);
        $reservationPresenters =  array();
        foreach ($booking->reservations as $reseration){
            $reservationPresenters[] = new ReservationPresenter($reseration);
        }

        return view('View_order', ['bookingPresenter'=>$bookingPresenter,'reservationPresenters'=> $reservationPresenters]);
    }
}
