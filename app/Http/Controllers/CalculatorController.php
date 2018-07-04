<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Facades\Calculator;

class CalculatorController extends Controller
{
    public function calculatePrice(Request $request)
    {
        $dataArray = $request->except(['_token', 'OK', 'firstForm']);
        if (isset($dataArray['name'])) {
            $prices[] = Calculator::calculate($dataArray);
        } else {
            $prices = [];
            foreach ($dataArray as $data) {
                array_push($prices, Calculator::calculate($data));
            }
        }

        return response()->json($prices);
    }
}
