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
        $this->addTestReservation('1','2018-08-14','2018-08-20',5);
        $this->addTestReservation('2','2018-08-14','2018-08-20',1);

        $this->addTestReservation('1','2018-08-17','2018-08-20',5);



    }
}
