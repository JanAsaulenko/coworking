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
                    <small>Таблиця замовлень</small>
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
                            <th>№</th>
                            <th>Клієнт</th>
                            <th>Статус замовлення</th>
                            <th>Дата початку</th>
                            <th>Час початку</th>
                            <th>Дата закінчення</th>
                            <th>Час закінчення</th>
                            <th>Сума</th>

                            <th>Час замовлення</th>
                            <th>Опції</th>
                        </tr>
                        </thead>
                        {{--<tbody>--}}
                        {{--@foreach($bookingPresenters as $bookingPresenter)--}}
                            {{--<tr class="@if($bookingPresenter->getStatusId()==1) danger @endif {{'status'.$bookingPresenter->getStatusId()}}">--}}
                                {{--<td>{{$bookingPresenter->getBookingFactId()}}</td>--}}
                                {{--<td>{{$bookingPresenter->getBookingFactClientData()}}</td>--}}
                                {{--<td>{{$bookingPresenter->getBookingFactStatusName()}}</td>--}}
                                {{--<td>{{$bookingPresenter->getBookingFactDateFrom()}}</td>--}}
                                {{--<td>{{$bookingPresenter->getBookingFactTimeFrom()}}</td>--}}
                                {{--<td>{{$bookingPresenter->getBookingFactDateTo()}}</td>--}}
                                {{--<td>{{$bookingPresenter->getBookingFactTimeTo()}}</td>--}}
                                {{--<td>Not Implement</td>--}}
                                {{--<td>{{$bookingPresenter->getBookingFactCreatedAt()}}</td>--}}
                                {{--<td>--}}
                                    {{--<form method="GET" action="{{action('OperatorController@showBooking',$bookingPresenter->getBookingFactId())}}">--}}
                                    {{--<button class="btn xs btn-primary" type="submit">Show</button>--}}
                                    {{--</form>--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                        {{--@endforeach--}}
                        {{--</tbody>--}}
                    </table>
                </div>
            </div>
        </div>

@endsection
