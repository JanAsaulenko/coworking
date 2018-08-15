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
        $SquareSpace = new Space;
        $SquareSpace->id_place = 1;
        $SquareSpace->name_space = "Square Space";
        $SquareSpace->number_of_seats = 20;
        $SquareSpace->save();

        $LongSpace = new Space;
        $LongSpace->id_place = 1;
        $LongSpace->name_space = "Long Space";
        $LongSpace->number_of_seats = 30;
        $LongSpace->save();

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

?>