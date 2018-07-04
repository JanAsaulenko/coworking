<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\DiscountType;

class DiscountTypesPreSet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
