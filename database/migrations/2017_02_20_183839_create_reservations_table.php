<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name')->nullable();
            $table->date('date_from');
            $table->time('time_from')->nullable();
            $table->date('date_to');
            $table->time('time_to')->nullable();
            $table->unsignedInteger('space_id');
            $table->unsignedInteger('seat_number')->nullable();
            $table->unsignedInteger('status_id')->default('1');
			$table->unsignedInteger('price')->nullable();
			$table->unsignedInteger('bookingfact_id');
            $table->timestamps();
			$table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
