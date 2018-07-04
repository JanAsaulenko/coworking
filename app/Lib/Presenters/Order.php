<?php

namespace App\Lib\Presenters;

use App\Order as OrderModel;

class Order{
    private $orderModel;
    public function __construct(OrderModel $order){
        $this->orderModel = $order;
    }
    public function getStatusName(){
        if($this->orderModel->status){
            return $this->orderModel->status->name;
        }
        else{
            return 'Status does not exist';
        }
    }
    public function getStatusId(){
        if($this->orderModel->status_id){
            return $this->orderModel->status_id;
        }
        else{
            return 'Status does not exist';
        }
    }
    public function getReservationId(){
        if($this->orderModel->reservation_id){
            return $this->orderModel->reservation_id;
        }
        else{
            return 'Reservation_id does not exist';
        }
    }
    public function getReservationName(){
        if($this->orderModel->reservation){
            return $this->orderModel->reservation->name;
        }
        else{
            return 'Reservation_name does not exist';
        }
    }
    public function getReservationDateForm(){
        if($this->orderModel->reservation){
            return $this->orderModel->reservation->date_from;
        }
        else{
            return 'Reservation_date_from does not exist';
        }
    }
    public function getReservationTimeForm(){
        if($this->orderModel->reservation){
            return $this->orderModel->reservation->time_from;
        }
        else{
            return 'Reservation_time_from does not exist';
        }
    }
    public function getReservationDateTo(){
        if($this->orderModel->reservation){
            return $this->orderModel->reservation->date_to;
        }
        else{
            return 'Reservation_date_to does not exist';
        }
    }
    public function getReservationTimeTo(){
        if($this->orderModel->reservation){
            return $this->orderModel->reservation->time_to;
        }
        else{
            return 'Reservation_date_to does not exist';
        }
    }
    public function getDiscountType(){
        if($this->orderModel->reservation){
            return $this->orderModel->reservation->discountType->discountname;
        }
        else{
            return 'Discount_id in reservation does not exist';
        }
    }
    public function getReservationPrice(){
        if($this->orderModel->reservation){
            return $this->orderModel->reservation->price;
        }
        else{
            return 'Reservation_price does not exist';
        }
    }
    public function getBookingfactsId(){
        if($this->orderModel->reservation->bookingfacts_id){
            return $this->orderModel->reservation->bookingfacts_id;
        }
        else{
            return 'Bookingfacts_id in reservation does not exist';
        }
    }
    public function getReservationCreatedAt(){
        if($this->orderModel->reservation->created_at){
            return $this->orderModel->reservation->created_at;
        }
        else{
            return 'Reservation_created_at does not exist';
        }
    }
}
