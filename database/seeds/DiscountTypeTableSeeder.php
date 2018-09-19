<?php

use Illuminate\Database\Seeder;
use App\DiscountType;

class DiscountTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $disc1 = new DiscountType;
        $disc1->discountname = 'Немає';
        $disc1->discountpercent = '0';
        $disc1->save();

        $disc2 = new DiscountType;
        $disc2->discountname = 'Студент ITA';
        $disc2->discountpercent = '10';
        $disc2->save();

        $disc3 = new DiscountType;
        $disc3->discountname = 'Учасник АТО';
        $disc3->discountpercent = '20';
        $disc3->save();

        $disc4 = new DiscountType;
        $disc4->discountname = 'Переміщена особа';
        $disc4->discountpercent = '30';
        $disc4->save();

        $disc5 = new DiscountType;
        $disc5->discountname = 'Інвалід';
        $disc5->discountpercent = '40';
        $disc5->save();

        $disc6 = new DiscountType;
        $disc6->discountname = 'Промокод';
        $disc6->discountpercent = '0';
        $disc6->save();
    }
}
