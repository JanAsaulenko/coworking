<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DiscountType;
use App\Status;
use App\Order;
use Validator;
use App\Lib\Calculator;
use DateTime;
use App\Discount;

class Reservation extends Model
{
    private $field;
    private $priceAll;
    public $errorsMesages;


    public function bookingfacts()
    {
        return $this->belongsTo('App\Bookingfact','id','id');
    }

    public function space(){
        return $this->belongsTo('App\Space','space_id','id');
    }

    public function city(){
        return $this->space->place->city;
    }

    public function discountType()
    {
        return $this->belongsTo('App\DiscountType', 'discount_type_id', 'id');
    }

//    public function statuses()
//    {
//        return $this->belongsToMany('App\Status', 'reservation_id', 'status_id');
//    }

//    public function orders()
//    {
//        return $this->hasMany('App\Order');
//    }

    public function validate($reservations)
    {
        $discountTypes = DiscountType::orderBy('id', 'asc')->get();
        $discountTypesCount = count($discountTypes);
        foreach ($reservations as $reservation) {
            $validatorReservations = Validator::make($reservation, [
                'name' => 'required|max:255',
                'discount' => 'required|numeric|max:' . $discountTypesCount . '|min:1',
                'fromdate' => 'required|date',
                'fromtime' => ['required', 'regex:^(([0-1][0-9]|2[0-3]):[0-5][0-9]?)$^'],
                'todate' => 'required|date',
                'totime' => ['required', 'regex:^(([0-1][0-9]|2[0-3]):[0-5][0-9]?)$^']
            ]);
            if ($validatorReservations->fails()) {
                $messages[] = $validatorReservations->getMessageBag()->keys();
                $this->errorsMesages = $validatorReservations->getMessageBag()->all();

            } else {
                $messages[] = [];
            }
        }

        $this->field = $messages;

        if ($validatorReservations->fails()) {
            return false;
        }
        return true;
    }

    public function saveInDatabase($reservations)
    {
        foreach ($reservations as $reservation) {
            $count = $this::where('guid', $reservation['guid'])->count();
            if ($count == 0) {
                $bookingFactId = Bookingfact::max('id');
                $newReservation = new Reservation;
                $newReservation->name = $reservation['name'];
                $dateFrom = strtotime($reservation['fromdate']);
                $newReservation->date_from = date("Y-m-d", $dateFrom);
                $timeFrom = strtotime($reservation['fromtime']);
                $newReservation->time_from = date("H:i", $timeFrom);
                $dateTo = strtotime($reservation['todate']);
                $newReservation->date_to = date("Y-m-d", $dateTo);
                $timeTo = strtotime($reservation['totime']);
                $newReservation->time_to = date("H:i", $timeTo);
                $newReservation->discount_type_id = $reservation['discount'];
                if($reservation['discount'] == 6) {
                    $newReservation->pr_code = $reservation['pr-code'];
                    $PrCode = Discount::all()->where('identifier', $reservation['pr-code'])->first();
                    if ($PrCode != null && $PrCode->one_time_only == 1 && $PrCode->is_valid == 1) {
                        $PrCode->is_valid = 0;
                        $PrCode->save();
                    } else{
                        $newReservation->pr_code = "";
                    }
                } else {
                    $newReservation->pr_code = "";
                }
                $newReservation->price = $reservation['price'];
                $newReservation->bookingfacts_id = $bookingFactId;
                $newReservation->guid = $reservation['guid'];
                $newReservation->save();
                $reservationId = Reservation::max('id');
                $newOrder = new Order;
                $newOrder->reservation_id = $reservationId;
                $newOrder->status_id = 1;
                $newOrder->save();
            }
        }
    }

    public function calculatePrices($reservations)
    {

        //dd($reservations);
        $count = 0;
        foreach ($reservations as &$reservation) {
            
            $calculate = new Calculator;
            $price[$count] = $calculate->calculate($reservation);
            $reservation['price'] = $price[$count++];
            $this->priceAll = $price;
        }
        return $reservations;
    }

    public function getGuid($reservation)
    {   $dataString = '';
        $dataString .= $reservation['name']
            . $reservation['discount']
            . $reservation['fromdate']
            . $reservation['fromtime']
            . $reservation['todate']
            . $reservation['totime'];
        $hash = strtoupper(md5($this->getRandomString($dataString)));
        $hyphen = chr(45);
        $uuid = substr($hash, 0, 8) . $hyphen
            . substr($hash, 8, 4) . $hyphen
            . substr($hash, 12, 4) . $hyphen
            . substr($hash, 16, 4) . $hyphen
            . substr($hash, 20, 12);
        return $uuid;
    }

    private function getRandomString($dataString)
    {
        $randomString = '';
        for ($i = 0; $i < strlen($dataString) - 1; $i++) {
            $randomString .= $dataString[rand(0, strlen($dataString) - 1)];
        }
        return $randomString;
    }
    public function getErrorsMessages()
    {
        return $this->errorsMesages;
    }

    public function preparationArray($reservations)
    {
        $i = 0;
        foreach ($reservations as &$reservation) {
            $i++;
            $reservation['number'] = $i;
            $reservation['guid'] = $this->getGuid($reservation);
            $reservation['orderPrice'] = array_sum($this->priceAll);
            $field = $this->field;
            $reservation['validationError'] = $field[$i - 1];
        }
        return $reservations;
    }

    public function preparationsArrayFirstForm($firstForm)
    {
        for ($i = 0; $i < $firstForm['places']; $i++) {
            $reservations[$i] = $firstForm;
            $reservations[$i]['validationError'] = [];
            if ($i != 0) {
                $firstForm[$i]['discount'] = 0;
                $firstForm[$i]['pr-code'] = "";
            }
        }
        return $reservations;
    }
    public function getOrders($guid , $array=null){
        $orders = $this::where('guid', $guid)->first();
        if($array==null) {
            $orders['dateTime'] = $this->helper($orders);
        }
        else{
            $orders=$this::where( 'bookingfacts_id',$orders->bookingfacts_id)->get();
            $i=1;
            $summPrice =0;
            foreach ($orders as $order){

                $order['dateTime']=$this->helper($order);
                $order['number']=$i++;
                $summPrice+=$order['price'];
            }
            $orders[0]['summPrice']=$summPrice;

        }
        return $orders;
    }
    private function helper($orders){
        $date_from = DateTime::createFromFormat('Y-m-d', $orders->date_from);
        $time_from = DateTime::createFromFormat('H:i:s', $orders->time_from);
        $date_to = DateTime::createFromFormat('Y-m-d', $orders->date_to);
        $time_to = DateTime::createFromFormat('H:i:s', $orders->time_to);
        $dateTime = [
            'date_from' => $date_from->format('d.m.Y'),
            'time_from' => $time_from->format('H:i'),
            'date_to'   => $date_to->format('d.m.Y'),
            'time_to'   => $time_to->format('H:i'),
        ];
        return $dateTime;

    }

}