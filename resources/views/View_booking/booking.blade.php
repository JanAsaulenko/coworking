

<link rel="stylesheet" href="{{ asset('/assets/css/reservation.css') }}"/>

@if(count($errors)>0)
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
@endif
<div id="banner-wrapper">
<!-- 	<span id="order-form"></span>	this is an anchor -->
	<div id="banner" class="box container no-overflow">

		<h1>Підтвердіть Ваше замовлення</h1>
		<table id="order-table" datarows="">
			<tr>
				<th rowspan="2">№</th>
				<th rowspan="2">Клієнт</th> 
				<th rowspan="2">Пільга</th>
				<th colspan="2">Початок періоду</th>
				<th colspan="2">Кінець періоду</th>
				<th rowspan="2">Ціна</th>
			</tr>
			<tr>
				<th>Дата</th>
				<th>Час</th>
				<th>Дата</th>
				<th>Час</th>
			</tr>
			@foreach ($reservations as $item)
				<tr>
					<td>{{$item['number']}}</td>
					<td>{{$item['name']}}</td>
					<td>{{$discountTypes[$item['discount']-1]->discountname}}</td>
					<td>{{$item['fromdate']}}</td>
					<td>{{$item['fromtime']}}</td>
					<td>{{$item['todate']}}</td>
					<td>{{$item['totime']}}</td>
					<td>{{$item['price']}}</td>
				</tr>
			@endforeach

			<tr >
				<th colspan="7">Разом</th>
				<th>{{$reservations[1]['orderPrice']}}</th>
			</tr>
		</table>

		<form id="third-form" method="POST" class="row" action="{{url('/booking/save')}}">
			{!! csrf_field() !!}
			<input type="hidden" name="firstForm" value="{{serialize($firstForm)}}">
			<input type="hidden" name="reservations" value="{{serialize($reservations)}}">
			<div class="4u 12u(small)">
				<label for="name">Ім'я замовника</label>
				<input type="text" id="name" maxlength="250" class="booking-input" name="name" placeholder="Ваше ім'я"
					value="{{$bookingfact['name'] or ""}}" required
					style="@if (isset($validationError) && in_array('name', $validationError) )
					{{"border:2px solid red !important;"}} @endif ">
			</div>
			<div class="4u 12u(small)">
				<label for="email">Електронна пошта</label>
				<input type="email" id="email" class="booking-input" maxlength="250" name="email"
					placeholder="e-mail" value="{{$bookingfact['email'] or ""}}" required
					style="@if (isset($validationError) && in_array('email', $validationError) )
					{{"border:2px solid red !important;"}} @endif ">
			</div>
			<div class="4u 12u(small)">
				<label for="phone">Контактний телефон</label>
				<input type="text" id="phone" class="booking-input" name="phone" placeholder="XX-XXX-XXX-XX-XX"
					title="Наприклад 38-063-321-54-76" pattern="[0-9]{2}-[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}"
					value="{{$bookingfact['phone'] or ""}}"
					style="@if (isset($validationError) && in_array('phone', $validationError) )
					{{"border:2px solid red !important;"}} @endif ">
			</div>
		</form>
		<div class="row">
			<div class="4u 5u(small)">
				<a  href="{{ url('/') }}" id="booking-no-btn" class="button">Відмовитись</a>
			</div>
			<div class="4u -4u 5u(small) -2u(small)">
				<input type="submit" name="OK" id="booking-done-btn" value="Замовити" form="third-form">
			</div>
		</div>
	</div>
	
</div>
<script>
	$(document).ready(function(){
		$('#phone').mask('00-000-000-00-00');
	});
</script>