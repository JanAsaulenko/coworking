<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservations', function(Blueprint $table)
        {
            $table->dropColumn('datetime_from');
            $table->dropColumn('datetime_to');
            $table->date('date_from')->after('name')->format('d-m-Y');
            $table->time('time_from')->after('date_from');
            $table->date('date_to')->after('time_from')->format('d-m-Y');
            $table->time('time_to')->after('date_to');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservations', function(Blueprint $table)
        {
            $table->dateTime('datetime_from');
            $table->dateTime('datetime_to');

            $table->dropColumn('date_from');
            $table->dropColumn('time_from');
            $table->dropColumn('date_to');
            $table->dropColumn('time_to');

        });
    }
}
