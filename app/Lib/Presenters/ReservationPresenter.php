<?php

namespace App\Lib\Presenters;
use App\Status;
use App\Reservation as ReservatioModel;
use App\Reservation;

class ReservationPresenter
{
    private $ReservationModel;

    public function __construct(Reservation $reservation)
    {
        $this->ReservationModel = $reservation;
    }

    public function getReservationId(){
        return $this->ReservationModel->id;
    }

    public function getStatusId()
    {
        if ($this->ReservationModel->status_id) {
            return $this->ReservationModel->status_id;
        } else {
            return 'Status does not exist';
        }
    }

    public function getReservationAddress(){
        return $this->ReservationModel->space->place->address.' '.$this->ReservationModel->space->name_space;
    }

    public function getReservationStatusName()
    {
        if ($this->getStatusId()) {
            $status = Status::all()->where('id', $this->getStatusId())->first();
            if ($status) {
                return $status->name;
            }
        }
        return 'Status does not exist';
    }

    public function getReservationSeatNumber(){
        return $this->ReservationModel->seat_number;
    }



    public function getReservationDateFrom()
    {
        if ($this->ReservationModel->date_from) {
            return $this->ReservationModel->date_from;
        } else {
            return 'DateFrom does not exist';
        }
    }


    public function getReservationTimeFrom()
    {
        if ($this->ReservationModel->time_from) {
            return $this->ReservationModel->time_from;
        } else {
            return 'Empty';
        }
    }


    public function getReservationTimeTo()
    {
        if ($this->ReservationModel->time_to) {
            return $this->ReservationModel->time_to;
        } else {
            return 'Empty';
        }
    }

    public function geReservationCreatedAt()
    {
        if ($this->BookingModel->created_at) {
            return $this->BookingModel->created_at;
        } else {
            return 'Booking_created_at does not exist';
        }
    }


}