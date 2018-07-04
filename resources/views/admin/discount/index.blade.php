@extends('layouts.admin_main')
@section('content')
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <div class="col-md-10 col-sm-10 col-xs-12 col-md-offset-1">
        <div class="x_panel">
            <div class="x_title">
                <h2>Купони
                    <small>перелік купонів</small>
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                {{Html::link(route('discount.create'), 'Додати',['class' => 'btn btn-success btn-sm'])}}
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
                        <th class="col-md-1 table_content">Купон</th>
                        <th class="col-md-1 table_content">Відсоток</th>
                        <th class="col-md-1 table_content">Днів&nbsp;Діє</th>{{--Количество дней на которые можно получить скидку--}}
                        <th class="col-md-2 table_content">Активний</th>
                        <th class="col-md-1 table_content">Одноразовий</th>
                        <th class="col-md-3 table_content">Дата закінчення</th>
                        <th class="col-md-4 table_content">Маніпуляції</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(Session::has('flash_message'))
                        <div class="alert alert-success" style="color:green; text-align: center;">
                            {{ Session::get('flash_message') }}
                        </div>
                    @endif
                    @foreach($discounts as $discount)
                        <tr class="table_content"
                            @if ($discount->isCorrect() == false)
                            style="color:red"
                                @endif
                        >
                            <th scope="row">{{ $discount->id }}</th>
                            <td>{{ $discount->identifier }}</td>
                            <td>{{ $discount->amount }}%</td>
                            <td>{{ $discount->days_covered }}</td>
                            <td>
                                @if($discount->is_valid === 1)
                                    yes
                                @elseIf($discount->is_valid === 0)
                                    no
                                @endif
                            </td>
                            <td>
                                @if($discount->one_time_only === 1)
                                    yes
                                @elseIf($discount->one_time_only === 0)
                                    no
                                @endif
                            </td>
                            <td>{{ $discount->valid_till_date }}</td>
                            <td>
                                {{Form::model($discount, array('route' => array('discount.destroy', $discount->id),'method' => 'DELETE')) }}
                                <div class="btn-group col-md-12 no-padding">
                                    {{Html::link( route('discount.edit', ['id' => $discount->id]), 'Змінити',['class' => 'btn btn-primary btn-xs', 'style' => 'width: 45%; font-size:14px'])}}
                                    {{Form::button('Видалити <i class="fa fa-minus-square"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'style' => 'width: 55%; font-size:14px')) }}
                                </div>
                                {{Form::close()}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection