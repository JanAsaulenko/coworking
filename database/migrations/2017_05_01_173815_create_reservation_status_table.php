<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationStatusTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('reservation_id');
			$table->integer('status_id');
			$table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
