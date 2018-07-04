@extends('layouts.admin_main')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-2">
        <div class="x_panel">
            <div class="x_title">
                <h2>Користувачі
                    <small>перелік користувачів</small>
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                {{Html::link(route('permissions.create'), 'Додати',['class' => 'btn btn-success btn-sm'])}}
                            </li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="col-md-1">#</th>
                        <th class="col-md-2 table_content">Користувач</th>
                        <th class="col-md-2 table_content">Місце</th>
                        <th class="col-md-2 table_content">Привілегія</th>
                        <th class="col-md-5 table_content">Маніпуляції</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(Session::has('flash_message'))
                        <div class="alert alert-success" style="color:green; text-align: center;">
                            {{ Session::get('flash_message') }}
                        </div>
                    @endif
                    @foreach($workers as $worker)
                        <tr class="table_content">
                            <th scope="row">{{ $worker->id }}</th>
                            <td>{{ $worker->user->name }}</td>
                            <td>{{ $worker->place->address }}</td>
                            <td>{{ $worker->role->name }}</td>
                            <td>
                                {{ Form::model($worker, array('route' => array('permissions.destroy', $worker->id),'method' => 'DELETE')) }}
                                <div class="btn-group col-md-12">
                                    {{ Html::link( route('permissions.edit', ['id' => $worker->id]), ' Змінити',['class' => 'btn btn-primary btn-xs', 'style' => 'width: 45%; font-size:14px']) }}
                                    {{ Form::button('Видалити <i class="fa fa-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'style' => 'width: 55%; font-size:14px')) }}
                                </div>
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection