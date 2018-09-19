<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Price;
class v2PriceController extends Controller
{
    public function getAllPrices(){
        $prices  = Price::all();
        $pricesArr = array();
        foreach ($prices as $price){
            $pricesArr[]= [
                'duration'=>$price->duration,
                'amount'=>$price->amount
                ];
        }
        return response()->json($pricesArr,200);
    }

}
