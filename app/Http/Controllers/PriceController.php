<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Validator;

use App\Price;
use App\Place;
use App\MainPageConfig;
use App\City;
use App\DiscountType;
use App\Reservation;


class PriceController extends Controller
{
    public function index(Request $request)
    {
        $prices = Price::all();
		return view('admin.price.index', ['prices'=>$prices]);
    }

    public function index2(Request $request){
        $prices = Price::all();
        $citys = City::orderBy('name', 'asc')->get();
        $places = Place::orderBy('address', 'asc')->get();
        $discountTypes = DiscountType::orderBy('id', 'asc')->get();

        return view('price', ['prices'=>$prices,
            'config'=> new MainPageConfig(),
            'citys'=> $citys,
            'discountTypes'=>$discountTypes,
            'places' => $places]);
    }

    public function create(Request $request)
	{
        $prices = Price::all();
		return view('admin.price.create', ['prices'=>$prices]);
    }

    public function store(Request $request)
    {
        $price = new Price;

        if ($price->isValid($request->all())){
            $price->save();
        }
        else{
            Session::flash('flash_message', 'Помилка, введіть коректні дані!');
            return redirect()->route('price.create');
        }
        Session::flash('flash_message', 'Ціну успішно додано!');
        return redirect()->route('price.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $prices = Price::all();
        $price = Price::find($id);
        return view('admin.price.edit', ['price_edit' => $price, 'prices' => $prices]);
    }

    public function update(Request $request, $id)
    {
        $price = Price::find($id);

        if($price->isValid($request->all())){
            $price->fillTest($request->all());
            $price->save();
            Session::flash('flash_message', 'Ціну успішно змінено!');
            return redirect()->route('price.index');
        }
        else{
            Session::flash('flash_message', 'Помилка, введіть коректні дані!');
            return redirect()->route('price.edit');
        }
    }

    public function destroy($id)
    {
        Price::destroy($id);
        Session::flash('flash_message', 'Ціну успішно видалено!');
        return redirect()->route('price.index');
    }
}
