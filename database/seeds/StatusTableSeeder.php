<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
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
}
