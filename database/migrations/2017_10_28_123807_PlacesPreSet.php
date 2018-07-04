<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Place;

class PlacesPreSet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $vaschuka = new Place;
        $vaschuka->id_city = 101;
        $vaschuka->address = "М.Ващука, 20";
        $vaschuka->longitude = "28.3964071";
        $vaschuka->latitude = "49.2308045";
        $vaschuka->start_time = "08:00:00";
        $vaschuka->end_time = "21:00:00";
        $vaschuka->number_of_seatplace = 50;
        $vaschuka->save();
    
        $keletska = new Place;
        $keletska->id_city = 101;
        $keletska->address = "Келецька, 126а";
        $keletska->longitude = "28.3947603";
        $keletska->latitude = "49.2297332";
        $keletska->start_time = "08:00:00";
        $keletska->end_time = "21:00:00";
        $keletska->number_of_seatplace = 60;
        $keletska->save();
        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Place::where('address','М.Ващука, 20')->delete();
    
        Place::where('address', 'Келецька, 126а')->delete();
    }
}
