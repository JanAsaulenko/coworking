<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropRoleUserTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('role_user');
    }

    public function down()
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('user_id');
			$table->integer('role_id')->default(4);;
        });
    }
}