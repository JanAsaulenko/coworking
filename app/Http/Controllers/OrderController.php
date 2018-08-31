<?php

namespace App\Http\Controllers;

use App\Bookingfact;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function show($uuid){
        $modelUuid = Bookingfact::where('uuid',$uuid)->first();
        if(!$modelUuid){
            return "<h1>Order Not Found</h1>";
        }
        return view('View_order');
    }
}
