<?php

use Illuminate\Database\Seeder;
use App\Status2;
class Status2TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $waiting_for_submit = new Status2();
        $waiting_for_submit->name='waiting_for_submit';
        $waiting_for_submit->save();

        $active = new Status2();
        $active->name='active';
        $active->save();

        $disabled = new Status2();
        $disabled->name='disabled';
        $disabled->save();
    }
}
