<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorrectPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('city_id');
			$table->string('address');
			$table->string('name')->nullable();
			$table->string('longitude')->nullable();
			$table->string('latitude')->nullable();
			$table->time('start_time');
			$table->time('end_time');
            $table->integer('number_of_seatplace')->default(0);
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
        Schema::dropIfExists('places');
    }
}
