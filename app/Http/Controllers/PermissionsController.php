<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Gate;

use App\User;
use App\Role;
use App\Place;
use App\Worker;
use App\Permission;

class PermissionsController extends Controller
{
    public function index(Request $request)
    {		
        $workers = Worker::all();
        return view('admin.permissions.index',['workers' => $workers]);
    }

    public function create(Request $request)
    {
        $users = User::pluck('name', 'id');
        $places = Place::pluck('address', 'id');
        $roles = Role::pluck('name', 'id');
    
        $workers = Worker::all();
        
        return view('admin.permissions.create', ['users'=>$users, 'places'=>$places, 'roles'=>$roles, 'workers'=>$workers]);
    }

    public function store(Request $request)
    {
        $worker = new Worker;
        $worker->savePermission($request->all());
        $worker->save();

        Session::flash('flash_message', 'Привілегію успішно додано!');
        return redirect()->route('permissions.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $worker = Worker::find($id);
        $workers = Worker::all();
        
        $users = User::pluck('name', 'id');
        $places = Place::pluck('address', 'id');
        $roles = Role::pluck('name', 'id');

        return view('admin.permissions.edit', [
            'worker_edit' => $worker, 'users'=>$users, 'places'=>$places, 'roles'=>$roles, 'workers'=>$workers
        ]);
    }

    public function update(Request $request, $id)
    {
        $worker = Worker::find($id);
        $worker->savePermission($request->all());
        $worker->save();

        Session::flash('flash_message', 'Привілегію успішно змінено!');
        return redirect()->route('permissions.index');
    }

    public function destroy($id)
    {
        Worker::destroy($id);
        Session::flash('flash_message', 'Привілегію успішно видалено!');
        return redirect()->route('permissions.index');
    }
}