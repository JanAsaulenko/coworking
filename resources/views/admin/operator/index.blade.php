@extends('layouts.admin_main')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(Session::has('flash_message'))
        <div class="alert alert-success" style="text-align: center;">
            {{ Session::get('flash_message') }}
        </div>
    @endif
    <div class="col-md-2">
        <div class="operator_text1">
          <span class="operator_text2">Фільтр замовлень:</span>
            <form method="POST" action="{{route('operator.find')}}" accept-charset="UTF-8">

                @foreach($bookingfactStatuses as $bookingStatus)
                <div class="checkbox">
                    <label>
                        <div class="icheckbox_flat-green pos_rel">
                            {!! Form::token() !!}
                            @if(array_key_exists($bookingStatus->id, $checked))
                            <input type="checkbox" id="booking-status-{{$bookingStatus->id}}"  name="{{$bookingStatus->id}}" class="flat" checked="checked" style="position: absolute; opacity: 0;">
                            @else
                                <input type="checkbox" id="booking-status-{{$bookingStatus->id}}"  name="{{$bookingStatus->id}}" class="flat"  style="position: absolute; opacity: 0;">
                            @endif
                        </div>
                        <span class="operator_text2">{{$bookingStatus->name}}</span>
                    </label>
                </div>
                @endforeach


                <div style="margin-top: 30px; margin-left: 30px;">
                    <button type="submit" class="btn btn-success">Шукати</button>
                </div>
            </form>
        </div>
    </div>
    <div>
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
                        <tbody>
                        @foreach($bookingPresenters as $bookingPresenter)
                            <tr class="@if($bookingPresenter->getStatusId()==1) danger @endif {{'status'.$bookingPresenter->getStatusId()}}">
                                <td>{{$bookingPresenter->getBookingFactId()}}</td>
                                <td>{{$bookingPresenter->getBookingFactClientData()}}</td>
                                <td>{{$bookingPresenter->getBookingFactStatusName()}}</td>
                                <td>{{$bookingPresenter->getBookingFactDateFrom()}}</td>
                                <td>{{$bookingPresenter->getBookingFactTimeFrom()}}</td>
                                <td>{{$bookingPresenter->getBookingFactDateTo()}}</td>
                                <td>{{$bookingPresenter->getBookingFactTimeTo()}}</td>
                                <td>Not Implement</td>
                                <td>{{$bookingPresenter->getBookingFactCreatedAt()}}</td>
                                <td>
                                    <form method="GET" action="{{action('OperatorController@showBooking',$bookingPresenter->getBookingFactId())}}">
                                    <button class="btn xs btn-primary" type="submit">Show</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">
                            Замовлення №
                            <span id="order-num"></span>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <table id="detailed-order">
                            <thead>
                            <tr>
                                <th>Ім'я замовника</th>
                                <th>Телефон</th>
                                <th>Email</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr id="empty-row" class="hidden">
                                <td class="DOname"></td>
                                <td class="DOphone"></td>
                                <td class="DOemail"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button value="1" type="button" class="btn btn-default status1">Відкрити</button>
                        <button value="2" type="button" class="btn btn-default status2">Зупинити</button>
                        <button value="3" type="button" class="btn btn-default status3">Не з'явився</button>
                        <button value="4" type="button" class="btn btn-default status4">Скасувати</button>
                        <button value="5" type="button" class="btn btn-default status5">Завершити</button>
                        <!--                 <button value="print" type="button" class="btn btn-default">Друк накладної</button> -->
                    </div>

                </div>
            </div>
        </div>
@endsection
