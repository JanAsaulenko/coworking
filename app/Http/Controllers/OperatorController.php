<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Reservation;
use App\DiscountType;
use App\Bookingfact;
use App\Order;
use App\Lib\Presenters\Order as OrderPresenter;

class OperatorController extends Controller
{
	public function index (){
		$orderPresenters = Order::all()->map(function($order){
			return new OrderPresenter($order);
		});
		return view('admin.operator.index', ['orderPresenters' => $orderPresenters]);
	}

	public function read (Request $request){
	   	$booking= Bookingfact::where('id', $request->bookingfacts_id)->first();
    	return response()->json($booking);
	}

	public function update (Request $request){
		$order = Order::where('reservation_id', $request->reservation_id)->first();
		$order->status_id = $request->status_id;
		$order->save();
		return "OK";

	   	// if ($order->isValid($request->all())){
	   	// 	$order->fillTest($request->all());
	   	//  	$order->save();
	   	//  	return "OK";
	   	// }else{
	   	// 	return ("ERROR");
	   	// }
	}
}
