<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use App\Place;
use App\Image;

class ImageController extends Controller
{
    public function index(Request $request)
    {		
		//
    }

    public function create(Request $request)
    {
        $places = Place::all();

        return view('admin.image.create', ['places'=>$places]);
    }

    public function store(Request $request){
        //dd($request->all());
        // foreach ($request->image as $key => $value) {
        //     dd($value);
        //     $image = new Image; 
        //     if ($image->isValid($value->all())){
        //         $imageName = time().'.'.$request->image->getClientOriginalExtension();
        //         $request->image->move(public_path('images\catalog'), $imageName);

        //         $image->place_id = $request->place_id;
        //         $image->name = $imageName;
        //         $image->save();    
        //     }
        // }
        
        $image = new Image; 
        
        if ($image->isValid($request->all())){
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images\catalog'), $imageName);

            $image->place_id = $request->place_id;
            $image->name = $imageName;
            $image->save();    
        }
        else{
            Session::flash('flash_message', 'Помилка, введіть коректні дані!');
            return redirect()->route('image.create');
        }        
        Session::flash('flash_message', 'Фото успішно додано!');
        return redirect()->route('image.create');  
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}