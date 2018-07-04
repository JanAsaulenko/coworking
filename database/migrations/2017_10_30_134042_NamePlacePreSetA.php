<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\NamePlace;
class NamePlacePreSetA extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $seaRoom = new NamePlace;
        $seaRoom->name = "Sea Room";
        $seaRoom->place_id = "13";
        $seaRoom->save();

        $magentaRoom = new NamePlace;
        $magentaRoom->name = "Magenta Room";
        $magentaRoom->place_id = "13";
        $magentaRoom->save();

        $relaxRoom = new NamePlace;
        $relaxRoom->name = "Relax Room";
        $relaxRoom->place_id = "13";
        $relaxRoom->save();

        $longSpace = new NamePlace;
        $longSpace->name = "Long Space";
        $longSpace->place_id = "14";
        $longSpace->save();

        $squereSpace = new NamePlace;
        $squereSpace->name = "Squere Space";
        $squereSpace->place_id = "14";
        $squereSpace->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        NamePlace::where('name','Sea Room')->delete();
        NamePlace::where('name','Magenta Room')->delete();
        NamePlace::where('name','Relax Room')->delete();
        NamePlace::where('name','Long Space')->delete();
        NamePlace::where('name','Squere Space')->delete();
    }
}
