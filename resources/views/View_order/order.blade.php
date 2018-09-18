{{--<link rel="stylesheet" href="{{ asset('/assets/css/reservation.css') }}"/>--}}

{{--<div id="banner-wrapper">--}}
    {{--<!-- 	<span id="order-form"></span>	this is an anchor -->--}}
    {{--<div id="banner" class="box container no-overflow">--}}
        {{--<h1>Ваше замовлення №{{$orders[0]['bookingfacts_id']}} збережено.</h1>--}}
        {{--<table id="order-table" datarows="">--}}
            {{--<tr>--}}
                {{--<th rowspan="2">№</th>--}}
                {{--<th rowspan="2">Клієнт</th>--}}
                {{--<th rowspan="2">Пільга</th>--}}
                {{--<th colspan="2">Початок періоду</th>--}}
                {{--<th colspan="2">Кінець періоду</th>--}}
                {{--<th rowspan="2">Унікальний код</th>--}}
                {{--<th rowspan="2" class="img-code">Qr code</th>--}}
                {{--<th rowspan="2">Ціна</th>--}}
                {{--<th rowspan="2" class="save">Зберегти</th>--}}
                {{--<th rowspan="2">Друк</th>--}}
            {{--</tr>--}}
            {{--<tr>--}}
                {{--<th>Дата</th>--}}
                {{--<th>Час</th>--}}
                {{--<th>Дата</th>--}}
                {{--<th>Час</th>--}}
            {{--</tr>--}}

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
                {{--<th>{{($orders[0]['summPrice'])}}</th>--}}
                {{--<th class="save">{{ Html::linkRoute('getPDF.all', 'Зберегти в PDF', array('guid' => $orders[0]['guid'])) }}</th>--}}
                {{--<td> <a href="#" onClick="window.print()"> <span class="glyphicon glyphicon-print"></span> </a></td>--}}
                {{--<input type="hidden" id="refreshed" value="no">--}}

            {{--</tr>--}}
        {{--</table>--}}
    {{--</div>--}}
{{--</div>--}}
{{--<script type="text/javascript">--}}
    {{--function printOneOrder(url) {--}}
        {{--window.location =url--}}
    {{--}--}}
    {{--onload=function(){--}}
        {{--var e=document.getElementById("refreshed");--}}
        {{--if(e.value=="no"){--}}
            {{--e.value="yes"--}}
        {{--}--}}
        {{--else{--}}
            {{--e.value="no";--}}
            {{--location.reload();--}}
        {{--}--}}
    {{--}--}}

{{--</script>--}}