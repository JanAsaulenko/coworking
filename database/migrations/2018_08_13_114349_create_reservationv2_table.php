<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationv2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation2', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_space');
            $table->integer('order2_id');
            $table->integer('number_of_seetplace');
            $table->dateTime('from');
            $table->dateTime('to');
            $table->integer('status_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservation2');
    }
}
