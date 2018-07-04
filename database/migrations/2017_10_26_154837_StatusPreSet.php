<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Status;

class StatusPreSet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $open = new Status;
        $open->name = 'відкриті';
        $open->save();
    
        $paused = new Status;
        $paused->name = 'призупинені';
        $paused->save();
    
        $notCame = new Status;
        $notCame->name = 'неявки';
        $notCame->save();
    
        $canceled = new Status;
        $canceled->name = 'скасовані';
        $canceled->save();
    
        $completed = new Status;
        $completed->name = 'завершені';
        $completed->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Status::where('name','відкриті')->delete();
    
        Status::where('name','призупинені')->delete();
    
        Status::where('name','неявки')->delete();
    
        Status::where('name','скасовані')->delete();
    
        Status::where('name','завершені')->delete();
    }
}
