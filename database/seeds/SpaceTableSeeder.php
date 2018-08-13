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

    }
}

?>