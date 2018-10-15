<?php
use Illuminate\Database\Seeder;
use App\City;
class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city1 = new City;
        $city1->id = "101";
        $city1->name = "Вінниця";
        $city1->save();
        $city2 = new City;
        $city2->id = "102";
        $city2->name = "Київ";
        $city2->save();
        $city3 = new City;
        $city3->id = "103";
        $city3->name = "Львів";
        $city3->save();
        $city4 = new City;
        $city4->id = "104";
        $city4->name = "Одеса";
        $city4->save();
        $city5 = new City;
        $city5->id = "105";
        $city5->name = "Харків";
        $city5->save();
        $city6 = new City;
        $city6->id = "106";
        $city6->name = "Крижопіль";
        $city6->save();
    }
}