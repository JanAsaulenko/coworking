<?php

namespace App\Http\Controllers;

use App\BookingfactStatus;
use App\Lib\Presenters\ReservationPresenter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Reservation;
use App\DiscountType;
use App\Bookingfact;
use App\Order;
use App\Lib\Presenters\Order as OrderPresenter;
use App\Lib\Presenters\BookingFactPresenter;
use Illuminate\Support\Facades\Redirect;

class OperatorController extends Controller
{
    public function index()
    {
        $bookingfactStatuses = BookingfactStatus::all();
        $checked = array();
        foreach ($bookingfactStatuses as $bf) {
            $checked[$bf->id] = 'on';
        }
        $bookingPresenters = Bookingfact::all()->map(function ($booking) {
            return new BookingFactPresenter($booking);
        });
        return view('admin.operator.index', [
            'checked' => $checked,
            'bookingfactStatuses' => $bookingfactStatuses,
            'bookingPresenters' => $bookingPresenters
        ]);
    }

    public function find(Request $request)
    {
        $bookingfactStatuses = BookingfactStatus::all();
        $checked = $request->except('_token');
        $checkedW = array();
        foreach ($checked as $key => $item) {
            $checkedW[] = $key;
        }
        $bookings = Bookingfact::all()->whereIn('bookingfact_statuses_id', $checkedW);
        $bookingPresenters = $bookings->map(function ($booking) {
            return new BookingFactPresenter($booking);
        });
        return view('admin.operator.index', [
            'checked' => $checked,
            'bookingfactStatuses' => $bookingfactStatuses,
            'bookingPresenters' => $bookingPresenters
        ]);
    }

    public function showBooking($id)
    {
        $booking = Bookingfact::where('id', $id)->first();
        if ($booking) {
            $bookingPresenter = new BookingFactPresenter($booking);
            $reservations = $booking->reservations()->get();
            $reservationsPresenters = $reservations->map(function ($reservation) {
                return new ReservationPresenter($reservation);
            });
            return view('admin.operator.bookingshow', [
                'bookingPresenter' => $bookingPresenter,
                'reservationPresenters' => $reservationsPresenters]);
        }
        return "<h1> Error </h1>>";
    }

    public function confirmBooking($id)
    {
        $booking = Bookingfact::find($id);
        $booking->confirm();
        return Redirect::back();
    }

    public function cancellBooking($id)
    {
        $booking = Bookingfact::find($id);
        $booking->cancell();
        return Redirect::back();
    }


    public function confirmReservation($id)
    {
        $reservaton = Reservation::find($id);
        $reservaton->confirm();
        return Redirect::back();
    }


    public function cancellReservation($id)
    {
        $reservation = Reservation::find($id);
        $reservation->cancell();
        return Redirect::back();
    }




}