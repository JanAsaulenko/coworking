<?php

use Illuminate\Database\Seeder;
use App\Bookingfact;
use App\Reservation;

class TestSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    function addTestReservation($space_id, $date_from, $date_to, $count_seat_place){

        $bookingfact = new Bookingfact();
        $bookingfact->space_id = $space_id;
        $bookingfact->name = 'test';
        $bookingfact->date_to = $date_to;
        $bookingfact->date_from = $date_from;
        $bookingfact->save();

        for ($n = 1; $n <= $count_seat_place; $n++){

            $reservation  = new Reservation();
            $reservation->bookingfact_id = $bookingfact->id;
            $reservation->name = 'test guest'.$n;
            $reservation->date_from = $date_from;
            $reservation->date_to = $date_to;
            $reservation->space_id = $space_id;
            $reservation->seat_number = $n;
            $reservation->price = 1234567;
            $reservation->save();
        }
        return null;
    }

    public function run()
    {
        $this->addTestReservation('1','2018-10-24','2018-10-26',10);
        $this->addTestReservation('4','2018-10-24','2018-10-30',5);
        $this->addTestReservation('3','2018-10-26','2018-11-01',3);
        $this->addTestReservation('2','2018-10-25','2018-10-31',1);
    }
}
