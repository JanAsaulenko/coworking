<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use Auth;
use Gate;
use DateTime;
use Validator;

use App\User;
use App\Discount;
use App\Worker;
use App\Http\Requests;
use App\Policies\WorkerPolicy;
use App\Helpers\ParseDate;

class DiscountController extends Controller
{
    public function index(Request $request)
    {
        $discounts = Discount::all();
        return view('admin.discount.index', ['discounts'=>$discounts]);
    }

    public function create(Request $request)
    {
        $min = ParseDate::parseDateFormat(date('Y-m-d h:m'));
        $amount = 0;
        $valid_till_date = ParseDate::parseDateFormat(date('Y-m-d h:m'));
        return view('admin.discount.create',compact('amount','valid_till_date','min'));

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),  [
            'count' => 'required|max:255',
        ]);

        $count = $request->get('count');
        for($i=0; $i<$count; $i++){
            $discount = new Discount();
            $data = $request->all();

            if($discount->isValid($data)){
                $discount->identifier = $discount->generatePromocode();
                $discount->fill($data);
                $discount->save();
            }
            else{
                Session::flash('flash_message', 'Помилка, введіть коректні дані!');
                return redirect()->route('discount.create');
            }
        }
        Session::flash('flash_message', 'Купони успішно додано!');
        return redirect()->route('discount.index');
    }

    public function show()
    {
       $discounts = Discount::all();
       return $discounts;
    }

    public function edit($id)
    {
        try {
            $discount = Discount::findOrFail($id);
        }catch (\Exception $e){
            Session::flash('flash_message', 'Ошибка');
            return redirect()->route('discount.index');
        }
        $amount = $discount->amount;
        $valid_till_date = ParseDate::parseDateFormat($discount->valid_till_date);
        $min = ParseDate::parseDateFormat(date('Y-m-d h:m'));
        return view('admin.discount.edit',compact('amount','valid_till_date','id','min'));
    }

    public function checkCode(Request $request)
    {
        $discount = Discount::byCode($request->code)->isActive()->get();

        if (isset($discount[0]))
            return 1;
        else
            return 0;
    }

    public function update(Request $request, $id)
    {
        try {
            $discount = Discount::findOrFail($id);
        }catch (\Exception $e){
            Session::flash('flash_message', 'Ошибка');
            return redirect()->route('discount.index');
        }
        if ($discount->isValid($request->all())){
            $discount->update($request->all());
            $discount->save();

            Session::flash('flash_message', 'Купон успішно змінено!');
            return redirect()->route('discount.index',$id);
        }
        else {
            Session::flash('flash_message', 'Помилка, введіть коректні дані!');
            return redirect()->route('discount.edit',$id);
        }
    }

    public function destroy($id)
    {
        Discount::destroy($id);
        Session::flash('flash_message', 'Купон успішно видалено!');
        return redirect()->route('discount.index');
    }
}