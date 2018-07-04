<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DiscountType;
use App\Bookingfact;
use App\Reservation;
use App\Lib\BookingCalculate;
use App\Lib\Occupancy;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Session;
class BookingController extends Controller
{
	public $firstForm, $discountTypes, $prices = [], $reservations,$bookingfact;


	function __construct (Request $request)
	{
		$this->firstForm = unserialize($request['firstForm']);
		$this->discountTypes = DiscountType::orderBy('id', 'asc')->get();
	}

    public function confirm(Request $request)
    {
        $this->reservations = $request->except(['_token', 'OK', 'firstForm']);
        $isOccupancyValid = Occupancy::GetOccupancyAfterReservationBlade($this->dataArray()['firstForm']['place'], $this->reservations);

        $reservationModel = new Reservation();
        $this->reservations = $reservationModel->calculatePrices($this->reservations);
        $isValid = $reservationModel->validate($this->reservations);
        $this->reservations=$reservationModel->preparationArray($this->reservations);
        if (!$isValid) {
            return view('View_reservation', $this->dataArray())->withErrors($reservationModel->getErrorsMessages());
        }
        else{
            //dd(empty($isOccupancyValid));
            if (!empty($isOccupancyValid)){
//                if (empty($isOccupancyValid)){
//                    return view('View_booking', $this->dataArray());
//                }
                return view('View_reservation', $this->dataArray(), ['errorMsg' => $isOccupancyValid]);
            } else{
                return view('View_booking', $this->dataArray());
            }
        }
    }

    public function save(Request $request)
    {
       
        $this->reservations = unserialize($request->input('reservations'));
        $bookingfact = $request->except(['_token', 'OK', 'reservations', 'firstForm']);
        $bookingfact['id_place'] = unserialize($request->firstForm)['place'];
        $newBookingfact = new Bookingfact;
        if (!$newBookingfact->isValid($bookingfact)) {
            return view('View_booking', $this->dataArray())->withErrors($newBookingfact->getErrorsMessages());
        } else {
            $reservations = new Reservation();
            $reservations->saveInDatabase($this->reservations);
            $orders = $reservations->getOrders($this->reservations[1]['guid'], 'array');
            $discountTypes = DiscountType::orderBy('id', 'asc')->get();

        }

        return view('View_order', ['orders' => $orders, 'discountTypes' => $discountTypes]);
    }

    private function dataArray()
    {
        $data = [
            'reservations' => $this->reservations,
            'discountTypes' => $this->discountTypes,
            'firstForm' => $this->firstForm,
        ];
        return $data;
    }
}