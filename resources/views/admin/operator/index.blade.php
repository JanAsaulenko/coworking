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
          <span class="operator_text2">Оберіть критерії пошуку:</span>
            <form method="POST" action="#" accept-charset="UTF-8">
                <div class="checkbox">
                    <label>
                        <div class="icheckbox_flat-green pos_rel">
                            <input type="checkbox" id="opened" checked name="1" class="flat" checked="checked" style="position: absolute; opacity: 0;">
                            <ins class="iCheck-helper operator_checkbox"></ins>
                        </div>
                        <span class="operator_text2">відкриті</span>
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <div class="icheckbox_flat-green pos_rel">
                            <input type="checkbox" id="stop" checked name="2" class="flat" checked="checked" style="position: absolute; opacity: 0;">
                            <ins class="iCheck-helper operator_checkbox"></ins>
                        </div>
                        <span class="operator_text2">призупинені</span>
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <div class="icheckbox_flat-green pos_rel">
                            <input type="checkbox" id="absence" checked name="3" class="flat" checked="checked" style="position: absolute; opacity: 0;">
                            <ins class="iCheck-helper operator_checkbox"></ins>
                        </div>
                        <span class="operator_text2">неявки</span>
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <div class="icheckbox_flat-green pos_rel">
                            <input type="checkbox" id="canceled" checked name="4" class="flat" checked="checked" style="position: absolute; opacity: 0;">
                            <ins class="iCheck-helper operator_checkbox"></ins>
                        </div>
                        <span class="operator_text2">скасовані</span>
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <div class="icheckbox_flat-green pos_rel">
                            <input type="checkbox" id="sold" checked name="5" class="flat" checked="checked" style="position: absolute; opacity: 0;">
                            <ins class="iCheck-helper operator_checkbox"></ins>
                        </div>
                        <span class="operator_text2">завершені</span>
                    </label>
                </div>
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
                    <table class="table cell-border hover hidden" id="orders-table"
                           data-last-id="{{$orderPresenters->max('id')}}">
                        <thead>
                        <tr class="oper_table">
                            <th>№</th>
                            <th>Клієнт</th>
                            <th>Дата початку</th>
                            <th>Час початку</th>
                            <th>Дата закінчення</th>
                            <th>Час закінчення</th>
                            <th>Вид знижки</th>
                            <th>Сума</th>
                            <th>Ід замовника</th>
                            <th>Status ID</th>
                            <th>Статус замовлення</th>
                            <th>Час замовлення</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orderPresenters as $orderPresenter)
                            <tr class="{{'status'.$orderPresenter->getStatusId()}}">

                                <td>{{$orderPresenter->getReservationId()}}</td>
                                <td>{{$orderPresenter->getReservationName()}}</td>

                                <td>{{$orderPresenter->getReservationDateForm()}}</td>
                                <td>{{$orderPresenter->getReservationTimeForm()}}</td>
                                <td>{{$orderPresenter->getReservationDateTo()}}</td>
                                <td>{{$orderPresenter->getReservationTimeTo()}}</td>
                                <td>{{$orderPresenter->getDiscountType()}}</td>
                                <td>{{$orderPresenter->getReservationPrice()}}</td>
                                <td>{{$orderPresenter->getBookingfactsId()}}</td>
                                <td>{{$orderPresenter->getStatusId()}}</td>
                                <td>{{$orderPresenter->getStatusName()}}</td>
                                <td>{{$orderPresenter->getReservationCreatedAt()}}</td>
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
@endsection
