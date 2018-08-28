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
			$table->dateTime('datetime_from');
			$table->dateTime('datetime_to');
			$table->unsignedInteger('discount_type_id');
            $table->string('pr_code');
			$table->unsignedInteger('price');
			$table->unsignedInteger('bookingfacts_id');
			$table->string('guid');
			$table->dateTime('used_at')->nullable();
            $table->timestamps();
			$table->softDeletes();
			$table->foreign('discount_type_id')->references('id')->on('discount_types');
			$table->foreign('bookingfacts_id')->references('id')->on('bookingfacts');
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
