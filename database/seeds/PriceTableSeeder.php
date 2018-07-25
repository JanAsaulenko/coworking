<?php

use Illuminate\Database\Seeder;
use App\Price;

class PriceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $price1 = new Price;
        $price1->duration = '1 година';
        $price1->amount = 20.00;
        $price1->save();

        $price1 = new Price;
        $price1->duration = '1 день';
        $price1->amount = 90.00;
        $price1->save();

        $price1 = new Price;
        $price1->duration = '5 днів';
        $price1->amount = 320.00;
        $price1->save();

        $price1 = new Price;
        $price1->duration = '10 днів';
        $price1->amount = 600.00;
        $price1->save();

        $price1 = new Price;
        $price1->duration = '2 тижні';
        $price1->amount = 800.00;
        $price1->save();

        $price1 = new Price;
        $price1->duration = '1 місяць';
        $price1->amount = 1050.00;
        $price1->save();
    }
}
