<?php

namespace App\Http\Controllers;

use App\BookingfactStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Reservation;
use App\DiscountType;
use App\Bookingfact;
use App\Order;
use App\Lib\Presenters\Order as OrderPresenter;
use App\Lib\Presenters\BookingFactPresenter;

class OperatorController extends Controller
{
	public function index (){
		$bookingfactStatuses = BookingfactStatus::all();
        $checked = array();
        foreach ($bookingfactStatuses as $bf){$checked[$bf->id] = 'on';}
	    $bookingPresenters = Bookingfact::all()->map(function($booking){return new BookingFactPresenter($booking);});
		return view('admin.operator.index', [
		    'checked' => $checked,
            'bookingfactStatuses' => $bookingfactStatuses ,
            'bookingPresenters' => $bookingPresenters
        ]);
	}

    public function find (Request $request){
        $bookingfactStatuses = BookingfactStatus::all();
        $checked = $request->except('_token');
        $checkedW = array();
        foreach ($checked as $key => $item){
            $checkedW[] = $key;
        }
        $bookings = Bookingfact::all()->whereIn('bookingfact_statuses_id',$checkedW);
        $bookingPresenters = $bookings->map(function($booking){ return new BookingFactPresenter($booking);});
        return view('admin.operator.index', [
            'checked' => $checked,
            'bookingfactStatuses' => $bookingfactStatuses ,
            'bookingPresenters' => $bookingPresenters
        ]);
    }

    public function showBooking ($id){
//	   	dd('dsadasd',$id);
    return view('admin.operator.bookingshow');
	}


//
//	public function update (Request $request){
//		$order = Order::where('reservation_id', $request->reservation_id)->first();
//		$order->status_id = $request->status_id;
//		$order->save();
//		return "OK";
//	}
}
