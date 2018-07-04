<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountsTable extends Migration
{
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->increments('id');
			$table->string('identifier');
			$table->float('amount');
			$table->integer('days_covered');
			$table->boolean('one_time_only');
			$table->boolean('is_valid');
			$table->dateTime('valid_till_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('discounts');
    }
}
