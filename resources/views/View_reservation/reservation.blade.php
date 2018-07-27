{{--<link rel="stylesheet" href="{{ asset('/assets/css/reservation.css') }}"/>--}}
{{--<script src="{{ asset('/assets/js/reservation.js') }}"></script>--}}
{{--<script src="{{ asset('/assets/js/DataPickerUA.js') }}"></script>--}}

<div id="banner-wrapper">
<!-- 	<span id="order-form"></span>	this is an anchor -->

	<div id="banner" class="box container no-overflow">	
		<div class="row line2">
			<div class="4u 12u(medium)">
				<input  class="disabled-input" type="text" form="first-form" value="{{$firstForm['townName']}}" readonly>
			</div>

			<div class="8u 12u(medium) 12u(small)">
				<input  class="disabled-input" type="text" form="first-form" value="{{$firstForm['placeName']}}" readonly>
			</div>
			@if(!empty($errorMsg))
			<div class="panel-warning">
				<div class="panel-heading">
					Зверніть увагу!!!
				</div>
				<div class="panel-footer">
					@foreach($errorMsg as $item)
						<p>{{$item}}</p>
					@endforeach
				</div>
			</div>
			@endif
		</div>
		@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<?php ?>
		<table id="reserv-table" datarows="{{count($reservations)}}">
			<form id="second-form" method="POST" action="{{url('booking')}}">
				{{ csrf_field() }}
				<input type="hidden" name="firstForm" value="{{serialize($firstForm)}}">
				<tr>
					<th rowspan="2">№</th>
					<th rowspan="2">Клієнт</th> 
					<th rowspan="2">Пільга</th>
					<th rowspan="2">Промокод</th>
					<th colspan="2">Початок періоду</th>
					<th colspan="2">Кінець періоду</th>
					<th rowspan="2">Ціна</th>
					<th rowspan="2">-</th>
				</tr>
				<tr>
					<th>Дата</th>
					<th>Час</th>
					<th>Дата</th>
					<th>Час</th>
				</tr>
			@foreach ($reservations as $reservation)
				<tr>
					<td>{{$loop->iteration}}</td>
					<td class="@if (in_array('name', $reservation['validationError']) ) {{"valid-error"}} @endif ">
						<input type="text" name="{{$loop->iteration."[name]"}}" form="second-form" placeholder="Введіть ім'я клієнта №{{$loop->iteration}}" value="{{$reservation['name'] or ''}}" required>
					</td>

					<td class="@if (in_array('discount', $reservation['validationError']) ) {{"valid-error"}} @endif ">
			    		<select name="{{$loop->iteration."[discount]"}}" form="second-form" required>
			    			@foreach ($discountTypes as $discountType)
			    				<option value="{{$discountType->id}}"
				    				@if ($discountType->discountname == $reservation['discount']){{'selected'}} @endif>
				    				{{$discountType->discountname}}
			    				</option>
			    			@endforeach
						</select>		    		
				    </td>

				    <td class="@if (in_array('pr-code', $reservation['validationError']) ) {{"valid-error"}} @endif ">
						<input type="text" name="{{$loop->iteration."[pr-code]"}}" form="second-form" class="promo-code-input" value="{{$reservation['pr-code'] or ''}}" maxlength="8" disabled>
					</td>

					<td class="@if (in_array('fromdate', $reservation['validationError']) ) {{"valid-error"}} @endif ">
						<input type="text" id="{{'from'.$loop->iteration}}" class="date-pck fromdate" name="{{$loop->iteration."[fromdate]"}}" value="{{$reservation['fromdate']}}" form="second-form" required>
					</td>
					<td class="@if (in_array('fromtime', $reservation['validationError']) ) {{"valid-error"}} @endif ">
						<input type="time" name="{{$loop->iteration."[fromtime]"}}" value="{{$reservation['fromtime'] or '09:00'}}" form="second-form" required>
					</td>
					<td class="@if (in_array('todate', $reservation['validationError']) ) {{"valid-error"}} @endif ">
						<input type="text" id="{{'to'.$loop->iteration}}" class="date-pck todate" name="{{$loop->iteration."[todate]"}}" value="{{$reservation['todate']}}" form="second-form" required>
					<td class="@if (in_array('totime', $reservation['validationError']) ) {{"valid-error"}} @endif ">
						<input type="time" name="{{$loop->iteration."[totime]"}}" value="{{$reservation['totime'] or '20:00'}}" form="second-form" required>
					</td>
					<td class="pricetd"></td>
					<td>
						<a class="del-row" href="#">
							<i class="fa fa-scissors" aria-hidden="true"></i>
						</a>
					</td>
				</tr>
			@endforeach
			</form>
		</table>
		
		<a class="add-row" href="#">Додати строку</a>

		<div class="row total-sum-container">
			<div class="9u 7u(small) text-total-sum">
				Загальна вартість:
			</div>

			<div class="2u 4u(small) total-sum">-</div>
		</div>

		<br>
		<div class="row sumbit-rate-btn-container">
			<div class="2u text-left">
				<a  href="{{ url('/') }}" id="reserv-back-btn" class="button fa-arrow-circle-left"></a>
			</div>
			<button class="-3u 3u  5u(medium) 12u(small) rate-btn">
				Тарифні плани
			</button>

			<div class="-1u 3u -2u(medium) 5u(medium) 12u(small) done-btn">
				<input type="button" name="OK" id="reserv-done-btn" value="Замовити" form="second-form">
			</div>
		</div>



	</div>
	
</div>
