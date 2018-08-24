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
            $table->string('name');
			$table->string('email')->nullable();
			$table->string('phone')->nullable();
            $table->date('date_from');
            $table->time('time_from')->nullable();
            $table->date('date_to');
            $table->time('time_to')->nullable();
			$table->unsignedInteger('bookingfact_statuses_id')->default('1');
            $table->unsignedInteger('space_id');
            $table->string('json_details',1500)->nullable();
			$table->softDeletes();
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
