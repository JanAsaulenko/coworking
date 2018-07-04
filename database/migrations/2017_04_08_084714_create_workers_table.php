<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkersTable extends Migration
{
    public function up()
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('user_id');
			$table->integer('place_id')->default(1);
			$table->integer('role_id')->default(4);
			$table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('workers');
    }
}