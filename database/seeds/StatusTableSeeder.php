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
        $open->name = 'Не підтвердженно';
        $open->save();

        $paused = new Status;
        $paused->name = 'Активно';
        $paused->save();

        $notCame = new Status;
        $notCame->name = 'Скасовано';
        $notCame->save();

    }
}
