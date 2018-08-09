<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingfactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookingfacts', function (Blueprint $table) {
            $table->increments('id');
			$table->softDeletes();
            $table->string('name');
			$table->string('email')->nullable();
			$table->string('phone')->nullable();
            $table->unsignedInteger('id_place');
            $table->foreign('id_place')->references('id')->on('places');
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
        Schema::dropIfExists('bookingfacts');
    }
}
