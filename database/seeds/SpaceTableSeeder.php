<?php

use Illuminate\Database\Seeder;
use App\Space;

class SpaceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $someSpace = new Space;
        $someSpace->place_id = 1;
        $someSpace->name_space = "SeaRoom";
        $someSpace->number_of_seats = 20;
        $someSpace->save();

        $someSpace = new Space;
        $someSpace->place_id = 1;
        $someSpace->name_space = "Magenta";
        $someSpace->number_of_seats = 20;
        $someSpace->save();

        $someSpace = new Space;
        $someSpace->place_id = 1;
        $someSpace->name_space = "RestRoom";
        $someSpace->number_of_seats = 10;
        $someSpace->save();

        $someSpace = new Space;
        $someSpace->place_id = 2;
        $someSpace->name_space = "SquareSpace";
        $someSpace->number_of_seats = 30;
        $someSpace->save();

        $someSpace = new Space;
        $someSpace->place_id = 2;
        $someSpace->name_space = "LongSpace";
        $someSpace->number_of_seats = 40;
        $someSpace->save();

        $SeaRoom = new Space;
        $SeaRoom->id_place = 2;
        $SeaRoom->name_space = "Sea Room";
        $SeaRoom->number_of_seats = 15;
        $SeaRoom->save();

        $MagentaRoom = new Space;
        $MagentaRoom->id_place = 2;
        $MagentaRoom->name_space = "Magenta Room";
        $MagentaRoom->number_of_seats = 20;
        $MagentaRoom->save();

        $RelaxRoom = new Space;
        $RelaxRoom->id_place = "2";
        $RelaxRoom->name_space = "Relax Room";
        $RelaxRoom->number_of_seats = 10;
        $RelaxRoom->save();

    }
}
