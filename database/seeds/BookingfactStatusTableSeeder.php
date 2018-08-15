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
        $status->name = 'Попередня резервація';
        $status->save();

        $status = new BookingfactStatus();
        $status->name = 'Резервуваня підтверджено';
        $status->save();

        $status = new BookingfactStatus();
        $status->name = 'Резервування скасовано';
        $status->save();

        $status = new BookingfactStatus();
        $status->name = 'Угода завершина';
        $status->save();

    }
}
