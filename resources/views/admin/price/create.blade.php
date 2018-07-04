@extends('layouts.admin_main')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-2">
        <div class="x_panel">
            <div class="x_title">
                <h2>Тарифи
                    <small>ціни оренди приміщень</small>
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                {{Html::link(route('price.create'), 'Додати',['class' => 'btn btn-success btn-sm'])}}
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
                        <th class="col-md-3 table_content">Термін</th>
                        <th class="col-md-3 table_content">Ціна</th>
                        <th class="col-md-5 table_content">Маніпуляції</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(Session::has('flash_message'))
                        <div class="alert alert-success" style="color:green; text-align: center;">
                            {{ Session::get('flash_message') }}
                        </div>
                    @endif
                    @foreach($prices as $price)
                        <tr class="table_content">
                            <th scope="row">{{ $price->id }}</th>
                            <td>{{ $price->duration }}</td>
                            <td class="col-md-3">{{ $price->amount }} грн.</td>
                            <td>
                                {{Form::model($price, array('route' => array('price.destroy', $price->id),'method' => 'DELETE')) }}
                                <div class="btn-group col-md-8 no-padding col-md-offset-2">
                                    {{Html::link( route('price.edit', ['id' => $price->id]), 'Змінити',['class' => 'btn btn-primary btn-xs', 'style' => 'width: 45%; font-size:14px'])}}
                                    {{Form::button('Видалити <i class="fa fa-minus-square"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'style' => 'width: 55%; font-size:14px')) }}
                                </div>
                                {{Form::close()}}
                            </td>
                        </tr>
                    @endforeach
                    <tr class="table_content">
                        <th scope="row">new</th>
                        {{ Form::open(array('route' => 'price.store','method'=>'POST')) }}
                        <td>
                            <div class="no-padding">
                                {{ Form::text('duration', '', ['class' => 'no-padding', 'style' => 'width:100px;']) }}
                            </div>
                        </td>
                        <td>
                            <div class="no-padding">
                                {{ Form::text('amount', '', ['class' => 'no-padding', 'style' => 'width:100px']) }}
                            </div>
                        </td>
                        <td>
                            <div class="col-md-8 col-md-offset-2 no-padding">
                                {{Form::button('<i class="fa fa-plus-square"></i>  Зберегти',  array('type' => 'submit', 'class' => 'btn btn-success btn-xs', 'style' => 'width: 100%; font-size:14px')) }}
                            </div>
                        </td>
                        {{Form::close()}}
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection