@extends('layouts.admin_main')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-2">
        @if(Session::has('flash_message'))
            <div class="alert alert-success" style="color:green; text-align: center;">
                {{ Session::get('flash_message') }}
            </div>
        @endif
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
                                {{ Html::link(route('price.create'), 'Додати',['class' => 'btn btn-success btn-sm']) }}
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
                    @foreach($prices as $price)
                        <tr class="table_content">
                            <th scope="row">{{ $price->id }}</th>
                            @if( $price->id != $price_edit->id)
                                <td>{{ $price->duration }}</td>
                                <td>{{ $price->amount }}</td>
                                <td>
                                    <div class="btn-group col-md-8 col-md-offset-2 no-padding">
                                        {{ Html::link( route('price.edit', ['id' => $price->id]), 'Змінити',['class' => 'btn btn-primary btn-xs', 'style' => 'width: 45%; font-size:14px'])}}
                                        {{ Form::button('Видалити <i class="fa fa-minus-square"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-xs disabled', 'style' => 'width: 55%; font-size:14px')) }}
                                    </div>
                                </td>
                            @else
                                {{ Form::model($price_edit, array('route' => array('price.update', $price_edit->id),'method' => 'PATCH')) }}
                                <td>
                                    <div class=" no-padding">
                                        {{ Form::text('duration', $price_edit->duration, ['class' => 'no-padding', 'style' => 'width:100px']) }}
                                    </div>
                                </td>
                                <td>
                                    <div class=" no-padding">
                                        {{ Form::text('amount', $price_edit->amount, ['class' => 'no-padding', 'style' => 'width:100px']) }}
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group col-md-8 col-md-offset-2 no-padding">
                                        {{ Form::submit('Змінити', ['class' => 'btn btn-primary btn-xs', 'style' => 'width: 45%; font-size:14px']) }}
                                        {{ Form::button('Видалити <i class="fa fa-minus-square"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-xs disabled', 'style' => 'width: 55%; font-size:14px')) }}
                                    </div>
                                </td>
                                {{ Form::close() }}
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection

