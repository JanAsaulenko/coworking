<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\Helpers\Facades\Calculator;
class UpdateDatabaseReservation extends Controller
{
    public function updateDatabase(Request $request, $id)
    {

        $reservation = Reservation::where('guid', $id)->get()->first();
        $data = $request->all();
        $reservation->name = $data['name'];
        $reservation->discount_type_id = $data['discount'];
        $dateFrom = \DateTime::createFromFormat('d.m.Y', $data['fromdate']);
        $reservation->date_from = $dateFrom->format('Y-m-d');
        $reservation->time_from = $data['fromtime'];
        $dateTo = \DateTime::createFromFormat('d.m.Y', $data['todate']);
        $reservation->date_to = $dateTo->format('Y-m-d');
        $reservation->time_to = $data['totime'];
        $reservation->price = Calculator::calculate($data);

        $reservationModel = new Reservation();
        $isValid = $reservationModel->validate([$data]);
        if ($isValid) {
            $reservation->save();

            return redirect()->route('show.guid', ['guid' => $id]);
        } else {
            return redirect()->back()->withErrors($reservationModel->getErrorsMessages());
        }
    }
}
