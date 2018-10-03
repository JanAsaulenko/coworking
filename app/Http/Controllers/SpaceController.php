<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;




use App\Place;
use App\Space;
use App\City;
use Doctrine\DBAL\Types\SimpleArrayType;


class SpaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spaces = Space::all();
        return view('admin.space.index',['spaces'=>$spaces]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $places = Place::all()->pluck('address', 'id');
        $places[0] = ' ---  ';
//                dd($places);
        $space = Space::find($id);
        return view('admin.space.edit',['space' => $space,'places' => $places]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $space = Space::find($id)->fill($request->except('_token','_method'));
        if($space->isValid($request->except('_token','_method'))){
            $space->fill($request->except('_token','_method'));
            $space->save();
            Session::flash('flash_message', 'Красава... Всьоо Чотко');
            return redirect()->route('space.index');
        }
        else{
            Session::flash('flash_message', 'Помилка, введіть коректні дані!');
            return redirect()->route('space.edit',$id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
