<?php

namespace App\Http\Controllers;
use App\Reservation;
use App\DiscountType;
use Illuminate\Http\Request;
use DateTime;

class PrintOrderController extends Controller
{
    public function printOrder($guid){


        $reservation=new Reservation();
        $order=$reservation->getOrders($guid);
        $discountTypes = DiscountType::orderBy('id', 'asc')->get();
        return view('View_print', ['order' => $order, 'discountTypes' => $discountTypes]);
    }
}
