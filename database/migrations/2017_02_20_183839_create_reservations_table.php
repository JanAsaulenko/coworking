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
			$table->string('name');

            $table->date('date_from');
            $table->time('time_from')->nullable();
            $table->date('date_to');
            $table->time('time_to')->nullable();

            $table->unsignedInteger('space_id');
            $table->unsignedInteger('seat_number')->nullable();

            $table->unsignedInteger('status_id')->default('1');
//			$table->unsignedInteger('discount_type_id')->nullable();
//            $table->string('pr_code')->nullable();
			$table->unsignedInteger('price');
			$table->unsignedInteger('bookingfact_id');
//			$table->string('guid')->nullable();
//			$table->dateTime('used_at')->nullable();
            $table->timestamps();
			$table->softDeletes();

//            $table->foreign('space_id')->references('id')->on('spaces');
//			$table->foreign('discount_type_id')->references('id')->on('discount_types');
//			$table->foreign('bookingfacts_id')->references('id')->on('bookingfacts');
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
