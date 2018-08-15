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

    }
}
