<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Price;

class PricePreSet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
