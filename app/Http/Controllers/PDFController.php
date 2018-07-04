<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use App\DiscountType;
use App\Bookingfact;
use App\Reservation;
use App\Lib\BookingCalculate;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PDFController extends Controller
{
    public function getPDF(Request $request)
    {
        $discountTypes = DiscountType::orderBy('id', 'asc')->get();
        $reservation = new Reservation();
        $order = $reservation->getOrders($request->guid);
        $pdf = PDF::loadView('pdf.customer', ['order' => $order, 'discountTypes' => $discountTypes]);

        return $pdf->stream('CoWorking_order.pdf');
    }

    public function getAllPDF(Request $request)
    {
        $reservation = new Reservation();
        $orders = $reservation->getOrders($request->guid, 'all');
        $discountTypes = DiscountType::orderBy('id', 'asc')->get();
        $pdf = PDF::loadView('pdf.customers', ['orders' => $orders, 'discountTypes' => $discountTypes]);

        return $pdf->stream('CoWorking_order.pdf');
    }
}
