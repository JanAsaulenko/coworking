<?php

use Illuminate\Database\Seeder;
use App\NamePlace;

class NamePlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seaRoom = new NamePlace;
        $seaRoom->name = "Sea Room";
        $seaRoom->place_id = "1";
        $seaRoom->save();

        $magentaRoom = new NamePlace;
        $magentaRoom->name = "Magenta Room";
        $magentaRoom->place_id = "1";
        $magentaRoom->save();

        $relaxRoom = new NamePlace;
        $relaxRoom->name = "Relax Room";
        $relaxRoom->place_id = "1";
        $relaxRoom->save();

        $longSpace = new NamePlace;
        $longSpace->name = "Long Space";
        $longSpace->place_id = "2";
        $longSpace->save();

        $squereSpace = new NamePlace;
        $squereSpace->name = "Squere Space";
        $squereSpace->place_id = "2";
        $squereSpace->save();

    }
}
