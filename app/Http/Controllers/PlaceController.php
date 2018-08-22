<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use Validator;
use App\City;
use App\Space;
use App\Place;
use App\Image;

class PlaceController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('admin.place.index', ['cities'=>$cities]);
    }



    public function create(Request $request)
    {
        $cities = City::all();
        return view('admin.place.create', ['cities'=>$cities]);

    }
    public function store(Request $request)
    {
        $place = new Place;
        if ($place->isValid($request->all())){
            $place->fill($request->except('_token')); //todo (author Panda ) Fix Problem with filing
            $place->save();
        }
        else{
            Session::flash('flash_message', 'Помилка, введіть коректні дані!');
            return redirect()->route('place.create');
        }
        Session::flash('flash_message', 'Місце успішно додано!');
        return redirect()->route('place.index');
    }
    public function show($id)
    {
        $images = Image::where('place_id', $id)->get();
        $places = Place::find($id);
        $spaces = Space::all()->where('place_id',$id);

        return view('admin.place.show', ['place' => $places, 'images' => $images, 'spaces' => $spaces]);

    }
    public function edit($id)
    {   $cities = City::all()->pluck('name', 'id');
        $images = Image::where('place_id', $id)->get();
        $places = Place::find($id);
        $spaces = Space::all()->where('place_id',$id);

        return view('admin.place.edit', ['place' => $places, 'images' => $images, 'spaces' => $spaces, 'cities' => $cities]);

    }
    public function update(Request $request, $id)
    {
        $place = Place::find($id)->fill($request->except('_token','_method'));
        if($place->isValid($request->except('_token','_method'))){
            $place->fill($request->except('_token','_method'));
            $place->save();
            Session::flash('flash_message', 'Красава... Всьоо Чотко');
            return redirect()->route('place.show',$id);
        }
        else{
            Session::flash('flash_message', 'Помилка, введіть коректні дані!');
            return redirect()->route('place.show',$id);
        }
    }

    public function destroy($id)
    {
        Place::destroy($id);
        Session::flash('flash_message', 'Місце успішно видалено!');
        return redirect()->route('place.index');
    }
}
