@extends('layouts.admin_main')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(Session::has('flash_message'))
        <div class="alert alert-success" style="text-align: center;">
            {{ Session::get('flash_message') }}
        </div>
    @endif

    {{--<div>--}}
        <div class="col-md-10 col-sm-10 col-xs-12" style="margin-top: 40px;">
            <div class="x_panel">
                <div class="x_title">
                    <small>Бронювання № 1234567890</small>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    {{--{{dd($bookingPresenters)}}--}}
                    {{--<table class="table cell-border hover hidden" id="orders-table" data-last-id="{{$bookingPresenters->max('id')}}">--}}
                    <table class="table table-bordered" style="text-align:center">

                        <thead>
                        <tr class="oper_table">
                            <th>Клієнт</th>
                            <th>Статус замовлення</th>
                            <th>Дата початку</th>
                            <th>Дата закінчення</th>
                            <td>Адреса</td>
                            <th>Сума</th>
                            <th>Час замовлення</th>
                            <th>Опції</th>
                        </tr>
                        </thead>
                        <tbody>

                            <tr class="@if($bookingPresenter->getStatusId()==1) danger @endif {{'status'.$bookingPresenter->getStatusId()}}">

                                <td>{{$bookingPresenter->getBookingFactClientData()}}</td>
                                <td>{{$bookingPresenter->getBookingFactStatusName()}}</td>
                                <td>{{$bookingPresenter->getBookingFactDateTimeFrom()}}</td>
                                <td>{{$bookingPresenter->getBookingFactDateTimeTo()}}</td>
                                <td>Not Implement</td>
                                <td>Not Implement</td>
                                <td>{{$bookingPresenter->getBookingFactCreatedAt()}}</td>
                                <td>

                                    <form method="POST" action="{{action('OperatorController@confirmBooking',$bookingPresenter->getBookingFactId())}}">
                                        {!! Form::token() !!}
                                        <button class="btn btn-xs btn-primary" type="submit">Підтвердити</button>
                                    </form>

                                    <form method="POST" action="{{action('OperatorController@cancellBooking',$bookingPresenter->getBookingFactId())}}">
                                        {!! Form::token() !!}
                                        <button class="btn btn-xs btn-danger" type="submit">Скасувати</button>
                                    </form>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>















    <div class="col-md-10 col-sm-10 col-xs-12" style="margin-top: 40px;">
        <div class="x_panel">

            <div class="x_content">
                {{--{{dd($bookingPresenters)}}--}}
                {{--<table class="table cell-border hover hidden" id="orders-table" data-last-id="{{$bookingPresenters->max('id')}}">--}}
                <table class="table table-bordered" style="text-align:center">

                    <thead>
                    <tr class="oper_table">
                        <th>Статус</th>
                        <th>Адреса, кімната</th>
                        <th>Дата</th>
                        <th>Номер місця</th>
                        <th>Початок</th>
                        <td>Закінчиння</td>
                        <th>Опції</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($reservationPresenters  as $reservationPresenter  )
                    <tr class="@if($reservationPresenter->getStatusId()== 1 ) danger @endif" >
                        <td>{{$reservationPresenter->getReservationStatusName()}}</td>
                        <td>{{$reservationPresenter->getReservationAddress()}}</td>
                        <td>{{$reservationPresenter->getReservationDateFrom()}}</td>
                        <td>{{$reservationPresenter->getReservationSeatNumber()}}</td>
                        <td>{{$reservationPresenter->getReservationTimeFrom()}}</td>
                        <td>{{$reservationPresenter->getReservationTimeTo()}}</td>
                        <th>
                            <form method="POST" action="{{action('OperatorController@confirmReservation',$reservationPresenter->getReservationId())}}">
                                {!! Form::token() !!}
                                <button class="btn btn-xs btn-primary" type="submit">Підтвердити</button>
                            </form>

                            <form method="POST" action="{{action('OperatorController@cancellReservation',$reservationPresenter->getReservationId())}}">
                                {!! Form::token() !!}
                                <button class="btn btn-xs btn-danger" type="submit">Скасувaти</button>
                            </form>
                        </th>
                    </tr>
                    @endforeach
{{--{{dd($reservationPresenters )}}--}}


                    </tbody>
                </table>
            </div>
        </div>
    </div>






@endsection
