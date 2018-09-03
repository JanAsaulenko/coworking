<link rel="stylesheet" href="{{ asset('/assets/css/reservation.css') }}"/>

<div id="banner-wrapper">
    <!-- 	<span id="order-form"></span>	this is an anchor -->
    <div id="banner" class="box container no-overflow">

        @if($bookingPresenter->getStatusId()==1)
        <h1>Ваше замовлення збережено.</h1>
        <h3>Очікуйте двінка від нашого менеджера</h3>
        @elseif($bookingPresenter->getStatusId()==2)
            <h1>Ваше замовлення підтверджено.</h1>
            @elseif($bookingPresenter->getStatusId()==3)
                <h1>Ваше замовлення скасовано.</h1>
        @endif







        <table id="order-table" datarows="">
        <tr>
            <th rowspan="2">Клієнт</th>
            <th colspan="2">Початок періоду</th>
            <th colspan="2">Кінець періоду</th>
            <th colspan="2">Місце</th>
            <th rowspan="2">Унікальний код</th>
            <th rowspan="2" class="img-code">Qr code</th>
            <th rowspan="2">Загальна вартість </th>
            {{--<th rowspan="2" class="save">Скасувати все</th>--}}
        </tr>
            <tr>
                <th>Дата</th>
                <th>Час</th>
                <th>Дата</th>
                <th>Час</th>
                <th>Address</th>
                <th>Space name</th>
            </tr>

            <tr>
                <td>{!! $bookingPresenter->getBookingClientData() !!}</td>
                <td>{{$bookingPresenter->getBookingFactDateFrom()}}</td>
                <td>{{$bookingPresenter->getBookingFactTimeFrom()}}</td>
                <td>{{$bookingPresenter->getBookingFactDateTo()}}</td>
                <td>{{$bookingPresenter->getBookingFactTimeTo()}}</td>
                <td>{{$bookingPresenter->getBookingReservationFullAddressWithoutBreak()}}</td>
                <td>{{$bookingPresenter->getBookingSpaceName()}}</td>
                <td>{{$bookingPresenter->getBookingUuid()}}</td>
                <td>QR code</td>
                <td>Default data</td>
            </tr>

        </table>



        <table id="order-table" datarows="">
            <tr>
                <th>Дата резервування</th>
                <th>Час почастку</th>
                <th>Час закінчення</th>

                <th>Зарезервовані місця</th>
                <th>Ціна</th>
                {{--<th rowspan="2" class="save">Скасувати</th>--}}
            </tr>

            @foreach($reservationPresenters as $reservationPresenter)

                <tr>
                    <td>{{$reservationPresenter->getReservationDateFrom()}}</td>
                    <td>{{$reservationPresenter->getReservationTimeFrom()}}</td>
                    <td>{{$reservationPresenter->getReservationTImeTo()}}</td>
                    <td>{{$reservationPresenter->getReservationSeatNumber()}}</td>
                    <td>------</td>
                </tr>

            @endforeach








            {{--@foreach ($orders as $order)--}}
                {{--<tr>--}}
                    {{--<td>{{$order['number']}}</td>--}}
                    {{--<td>{{$order['name']}}</td>--}}
                    {{--<td>{{$discountTypes[$order['discount_type_id']-1]->discountname}}</td>--}}
                    {{--<td>{{$order['dateTime']['date_from']}}</td>--}}
                    {{--<td>{{$order['dateTime']['time_from']}}</td>--}}
                    {{--<td>{{$order['dateTime']['date_to']}}</td>--}}
                    {{--<td>{{$order['dateTime']['time_to']}}</td>--}}
                    {{--<td><a href="{{$url=route('show.guid',['guid'=>$order['guid']])}}">{{$order['guid']}}</a></td>--}}
                    {{--<td><p class="fig"><img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(150)->generate($url)) !!} "></p></td>--}}
                    {{--<td>{{$order['price']}}</td>--}}
                    {{--<td class="save">{{ Html::linkRoute('getPDF', 'Зберегти в PDF', array('guid' => $order['guid'])) }}</td>--}}
                    {{--<th> <a href="#" onclick="printOneOrder('{{route('print.guid',['guid'=>$order['guid']])}}')"> <span class="glyphicon glyphicon-print"></span> </a></th>--}}
                {{--</tr>--}}
            {{--@endforeach--}}
            {{--<tr>--}}
                {{--<th colspan="9">Разом</th>--}}
                {{--<th></th>--}}
                {{--<th class="save">--}}
                    {{--Зберегти в PDF--}}
                    {{--{{ Html::linkRoute('getPDF.all', 'Зберегти в PDF', array('uuid' => $orders[0]['guid'])) }}--}}
                {{--</th>--}}
                {{--<td> <a href="#" onClick="window.print()"> <span class="glyphicon glyphicon-print"></span> </a></td>--}}
                {{--<input type="hidden" id="refreshed" value="no">--}}

            {{--</tr>--}}
        </table>
    </div>
</div>
<script type="text/javascript">
    function printOneOrder(url) {
        window.location =url
    }
    onload=function(){
        var e=document.getElementById("refreshed");
        if(e.value=="no"){
            e.value="yes"
        }
        else{
            e.value="no";
            location.reload();
        }
    }

</script>