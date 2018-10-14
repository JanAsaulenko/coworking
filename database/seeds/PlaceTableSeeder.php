<?php

use Illuminate\Database\Seeder;
use App\Place;

class PlaceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vaschuka = new Place;
        $vaschuka->id = '1';
        $vaschuka->city_id = 101;
        $vaschuka->address = "М.Ващука, 20";
        $vaschuka->longitude = "28.3964071";
        $vaschuka->latitude = "49.2308045";
        $vaschuka->start_time = "08:00:00";
        $vaschuka->end_time = "21:00:00";
        $vaschuka->number_of_seatplace = 50;
        $vaschuka->save();

        $keletska = new Place;
        $keletska->id = '2';
        $keletska->city_id = 101;
        $keletska->address = "Келецька, 126а";
        $keletska->longitude = "28.3947603";
        $keletska->latitude = "49.2297332";
        $keletska->start_time = "08:00:00";
        $keletska->end_time = "21:00:00";
        $keletska->number_of_seatplace = 60;
        $keletska->save();

        $keletska = new Place;
        $keletska->id = '3';
        $keletska->city_id = 101;
        $keletska->address = "";
        $keletska->longitude = "";
        $keletska->latitude = "";
        $keletska->start_time = "08:00:00";
        $keletska->end_time = "21:00:00";
        $keletska->number_of_seatplace = 0;
        $keletska->save();






    }
}
