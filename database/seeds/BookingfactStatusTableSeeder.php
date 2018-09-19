<?php

use Illuminate\Database\Seeder;
use App\BookingfactStatus;

class BookingfactStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $status = new BookingfactStatus();
        $status->name = 'Не підтвердженно';
        $status->save();

        $status = new BookingfactStatus();
        $status->name = 'Активно';
        $status->save();

        $status = new BookingfactStatus();
        $status->name = 'Скасовано';
        $status->save();

        $status = new BookingfactStatus();
        $status->name = 'Завершено';
        $status->save();

    }
}
