<!DOCTYPE html>
<html>
<head>
	<title>Замовлення</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <style type="text/css">
        body{
            font-family: Open Sans !important;
        }
        .bold{
            font-weight: bold;
        }
    </style>
</head>
<body>
<div id="banner-wrapper">
    <div id="banner" class="box container no-overflow">
        <table id="order-table" datarows="">
            <tr>
                <th rowspan="2">Клієнт</th>
                <th rowspan="2">Пільга</th>
                <th colspan="2">Початок періоду</th>
                <th colspan="2">Кінець періоду</th>
                <th rowspan="2">Унікальний код</th>
                <th rowspan="2">Qr code</th>
                <th rowspan="2">Ціна</th>
            </tr>
            <tr>
                <th>Дата</th>
                <th>Час</th>
                <th>Дата</th>
                <th>Час</th>
            </tr>
            @foreach($orders as $order)
                <tr>
                    <td>{{$order->name}}</td>
                    <td>{{$discountTypes[$order['discount_type_id']-1]->discountname}}</td>
                    <td>{{$order->date_from}}</td>
                    <td>{{$order->time_from}}</td>
                    <td>{{$order->date_to}}</td>
                    <td>{{$order->time_to}}</td>
                    <td>{{$order->guid}}</td>
                    <td><img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(150)->generate($order->guid)) !!}"></td>
                    <td>{{$order->price}}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
</body>
</html>