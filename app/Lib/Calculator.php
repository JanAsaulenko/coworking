<?php

namespace App\Lib;

use DateTime;
use App\DiscountType;
use App\Price;
use App\Discount;

class Calculator
{
    public function calculate($inData){
		$prices = Price::all();
    	$priceHour = $prices[0]->amount;		//20
    	$priceDay1_4 = $prices[1]->amount;		//90
    	$priceDay5_9 = round($prices[2]->amount/5,2); 	//64
        $priceDay10_13 = round($prices[3]->amount/10,2); //60
    	$priceDay14_29 = round($prices[4]->amount/14, 2); //57.14
//    	$priceDay30 = round($prices[5]->amount/30,2);	//35

    	$startDate = DateTime::createFromFormat('d.m.Y', $inData['fromdate']);
    	$endDate = DateTime::createFromFormat('d.m.Y', $inData['todate']);
    	$days = $startDate->diff($endDate)->format('%a') + 1;

    	$startTime = DateTime::createFromFormat('H:i', $inData['fromtime']);
    	$endTime = DateTime::createFromFormat('H:i', $inData['totime']);
    	$hoursAday = $startTime->diff($endTime)->format('%h');
    	$minutes = $startTime->diff($endTime)->format('%i');
    	$hoursAday += $minutes / 60;

   		$discountTypes = DiscountType::orderBy('id', 'asc')->where('id', $inData['discount'])->first();
		$discount = (100 - $discountTypes['discountpercent']) / 100;
    	if ($hoursAday < 5)
			$price = $days * $hoursAday * $priceHour * $discount;
	    elseif ($days < 5)
	    	$price = $days * $priceDay1_4 * $discount;
	    elseif ($days < 10)
			$price = $days * $priceDay5_9 * $discount;
	    elseif ($days < 14)
			$price = $days * $priceDay10_13 * $discount;
		elseif ($days < 30)
			$price = $days * $priceDay14_29 * $discount;
		elseif ($days >= 30)
            $price = $days * $priceDay14_29 * $discount;
//			$price = $days * $priceDay30 * $discount;


        if ($price > 0 && $price < $priceHour)
			$price = $priceHour;



		if($discountTypes->discountname == 'Промокод'){
			$codeDiscount = Discount::all()->where('identifier', $inData['pr-code'])->first();

			if ($codeDiscount == null){
				return round($price, 2);
			}

			if ($codeDiscount->identifier == $inData['pr-code'] && $codeDiscount->is_valid == 1){
				$codeAmount = (1 - $codeDiscount->amount/100);
				$codeDays = $codeDiscount->days_covered;
			} else {
				return round($price, 2);
			}

			if ($days <= $codeDays){
				$price = $price * $codeAmount;
			}
			else {
				$p1 = ($codeDays * $price) / $days;
				$price = ($p1 * $codeAmount) + ($price - $p1);
			}
			return round($price, 2);
		} else {
			return round($price, 2);
		}



    }
}
