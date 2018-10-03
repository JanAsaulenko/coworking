<?php

namespace App\Lib\Presenters;

use App\Bookingfact;
use App\BookingfactStatus;
use App\Order as OrderModel;

class BookingFactPresenter{
    private $BookingModel;
    public function __construct(Bookingfact $bookingFact){
        $this->BookingModel = $bookingFact;
    }

    public function getStatusId(){
         if($this->BookingModel->bookingfact_statuses_id){
            return $this->BookingModel->bookingfact_statuses_id;
        }
        else{
            return 'Status does not exist';
        }
    }

    public function getBookingFactId(){
        return $this->BookingModel->id;
    }

    public function getBookingFactClientData(){//by Admin Page
        $resultString = '';
        $resultString.=$this->BookingModel->name.' ';
        $resultString.=$this->BookingModel->email.' ';
        $resultString.=$this->BookingModel->phone;
        return $resultString;
    }

    public function getBookingClientData(){//by Order pages
        $resultString = '';
        if($this->BookingModel->name){
            $resultString.=$this->BookingModel->name.'<br>';
        }
        if($this->BookingModel->email){
            $resultString.=$this->BookingModel->email.'<br>';
        }
        if($this->BookingModel->phone){
            $resultString.=$this->BookingModel->phone;
        }
        return $resultString;
    }

    public  function getBookingReservationFullAddressWithoutBreak(){
        $address = '';
        if ($this->BookingModel->space->place->city){
            $address.='м.'.$this->BookingModel->space->place->city->name.' ';
        }
        if ($this->BookingModel->space->place){
            $address.=$this->BookingModel->space->place->address.' ';
        }
       return $address;
    }

    public function getBookingSpaceName(){
        return $this->BookingModel->space->name_space;
    }

    public function getBookingUuid(){
        return $this->BookingModel->uuid;
    }


    public function getBookingFactStatusName(){
        if($this->getStatusId()){
            $status = BookingfactStatus::all()->where('id',$this->getStatusId())->first();
            if($status) {
                return $status->name;
            }
        }
            return 'Status does not exist';

    }









    public function getBookingFactDateTimeFrom(){
        $str = $this->BookingModel->date_from;
        $str .='  '.$this->BookingModel->time_from;
        if($str){
            return $str;
        }
        return 'Не призначено';
    }
    public function getBookingFactDateTimeTo(){
        $str = $this->BookingModel->date_to;
        $str .='  '.$this->BookingModel->time_to;
        if($str){
            return $str;
        }
        return 'Не призначено';
    }




    public function getBookingFactDateFrom(){
        if($this->BookingModel->date_from){
            return $this->BookingModel->date_from;
        }
        else{
            return 'DateFrom does not exist';
        }
    }

    public function getBookingFactTimeFrom(){
        if($this->BookingModel->time_from){
            return $this->BookingModel->time_from;
        }
        else{
            return 'TimeFrom does not exist';
        }
        return $this->BookingModel->time_from;
    }

    public function getBookingFactDateTo(){
        if($this->BookingModel->date_to){
            return $this->BookingModel->date_to;
        }
        else{
            return 'DateTo does not exist';
        }
    }

    public function getBookingFactTimeTo(){
        if($this->BookingModel->time_to){
            return $this->BookingModel->time_to;
        }
        else{
            return 'TimeTo does not exist';
        }
    }

    public function getBookingFactCreatedAt(){
        if($this->BookingModel->created_at){
            return $this->BookingModel->created_at;
        }
        else{
            return 'Booking_created_at does not exist';
        }
    }





//    public function getStatusName(){
////        if($this->BookingModel->status){
////            return $this->orderModel->status->name;
////        }
////        else{
////            return 'Status does not exist';
////        }
//    }
//    public function getStatusId(){
//        if($this->orderModel->bookingfact_statuses_id){
//            return $this->orderModel->bookingfact_statuses_id;
//        }
//        else{
//            return 'Status does not exist';
//        }
//    }
//
//    public function getReservationId(){
//        if($this->orderModel->reservation_id){
//            return $this->orderModel->reservation_id;
//        }
//        else{
//            return 'Reservation_id does not exist';
//        }
//    }
//
//    public function getReservationName(){
//        if($this->orderModel->reservation){
//            return $this->orderModel->reservation->name;
//        }
//        else{
//            return 'Reservation_name does not exist';
//        }
//    }
//    public function getReservationDateForm(){
//        if($this->orderModel->reservation){
//            return $this->orderModel->reservation->date_from;
//        }
//        else{
//            return 'Reservation_date_from does not exist';
//        }
//    }
//    public function getReservationTimeForm(){
//        if($this->orderModel->reservation){
//            return $this->orderModel->reservation->time_from;
//        }
//        else{
//            return 'Reservation_time_from does not exist';
//        }
//    }
//    public function getReservationDateTo(){
//        if($this->orderModel->reservation){
//            return $this->orderModel->reservation->date_to;
//        }
//        else{
//            return 'Reservation_date_to does not exist';
//        }
//    }
//    public function getReservationTimeTo(){
//        if($this->orderModel->reservation){
//            return $this->orderModel->reservation->time_to;
//        }
//        else{
//            return 'Reservation_date_to does not exist';
//        }
//    }
//    public function getDiscountType(){
//        if($this->orderModel->reservation){
//            return $this->orderModel->reservation->discountType->discountname;
//        }
//        else{
//            return 'Discount_id in reservation does not exist';
//        }
//    }
//    public function getReservationPrice(){
//        if($this->orderModel->reservation){
//            return $this->orderModel->reservation->price;
//        }
//        else{
//            return 'Reservation_price does not exist';
//        }
//    }
//    public function getBookingfactsId(){
//        if($this->orderModel->reservation->bookingfacts_id){
//            return $this->orderModel->reservation->bookingfacts_id;
//        }
//        else{
//            return 'Bookingfacts_id in reservation does not exist';
//        }
//    }
//    public function getReservationCreatedAt(){
//        if($this->orderModel->reservation->created_at){
//            return $this->orderModel->reservation->created_at;
//        }
//        else{
//            return 'Reservation_created_at does not exist';
//        }
//    }
}
