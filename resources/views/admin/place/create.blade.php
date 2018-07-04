@extends('layouts.admin_main')
@section('content')
<div class="col-lg-9">
	<div class="x_panel">
		<div class="operator_text2" style="text-align: center;">Оберіть критерії для додавання:</div>
			<ul class="nav navbar-right panel_toolbox">
	                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	                </li>
	                <li class="dropdown">
	                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
	                       aria-expanded="false"><i class="fa fa-wrench"></i></a>
	                    <ul class="dropdown-menu" role="menu">
	                    </ul>
	                </li>
	                <li><a class="close-link"><i class="fa fa-close"></i></a>
	                </li>
	            </ul>
				<form action="{{ route('place.store') }}" method="POST" class="">
				{!! csrf_field() !!}
				<div class="x_content">
					<div class="form-group operator_text2">
				    	<label for="city" class="operator_text2">Місто</label>
			    		<select id="city" name="id_city" class="form-control" required>
							<option></option>
							@foreach($cities as $city)
								<option value="{{$city->id}}">{{$city->name}}</option>
							@endforeach
						</select>
						<a href="#" id="go">Додати місто</a>
				  	</div>
				</div>

					<div class="x_content">
						<div class="form-group operator_text2">
							<label for="address" class="operator_text2">Адреса</label>
							<input type="text" name="address" placeholder="Адреса" id="address" class="form-control" value="" required>
						</div>
					</div>
					<div class="x_content">
						<div class="form-group operator_text2">
							<label for="start-time" class="operator_text2">Час початку</label>
							<input type="time" name="start_time" id="start-time" class="form-control" value="08:00:00">
						</div>
					</div>
					<div class="x_content">
						<div class="form-group operator_text2">
							<label for="end-time" class="operator_text2">Час закінчення</label>
							<input type="time" name="end_time" id="end-time" class="form-control" value="20:00:00">
						</div>
					</div>
					<div class="x_content">
						<div class="form-group operator_text2">
							<label for="number_of_seatplace" class="operator_text2">Кількість робочих місць</label>
							<input type="number" name="number_of_seatplace" id="number_of_seatplace" placeholder="Кількість робочих місць" class="form-control" max="1000">
						</div>
					</div>
					<div class="x_content"> 
						<div class="form-group operator_text2">
							<button type="submit" class="btn btn-success">
								Додати місце
							</button>
						</div>
					</div>
				</form>
		@if(Session::has('flash_message'))
			<div class="alert alert-danger" style="text-align: center;"> 
				{{ Session::get('flash_message') }} 
			</div> 
		@endif
			<div id="modal_form">
				<a href="#"><span id="modal_close" style="float:right;">X</span></a>
				<form action="{{ url('/city') }}" method="POST">
					{!! csrf_field() !!}
					<div class="form-group">
						<label for="city">Місто</label>
						<input type="text" name="name" placeholder="Місто" id="city" class="form-control">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success btn-sm">
							Додати місто
						</button>
					</div>
				</form>
			</div>
		<div id="overlay"></div>
	</div>
</div>
<script>
$(document).ready(function() { // вся мaгия пoсле зaгрузки стрaницы
	$('a#go').click( function(event){ // лoвим клик пo ссылки с id="go"
		event.preventDefault(); // выключaем стaндaртную рoль элементa
		$('#overlay').fadeIn(400, // снaчaлa плaвнo пoкaзывaем темную пoдлoжку
		 	function(){ // пoсле выпoлнения предъидущей aнимaции
				$('#modal_form') 
					.css('display', 'block') // убирaем у мoдaльнoгo oкнa display: none;
					.animate({opacity: 1, top: '50%'}, 200); // плaвнo прибaвляем прoзрaчнoсть oднoвременнo сo съезжaнием вниз
			}
		);
	});
	/* Зaкрытие мoдaльнoгo oкнa, тут делaем тo же сaмoе нo в oбрaтнoм пoрядке */
	$('#modal_close, #overlay').click( function(){ // лoвим клик пo крестику или пoдлoжке
		$('#modal_form')
			.animate({opacity: 0, top: '45%'}, 200,  // плaвнo меняем прoзрaчнoсть нa 0 и oднoвременнo двигaем oкнo вверх
				function(){ // пoсле aнимaции
					$(this).css('display', 'none'); // делaем ему display: none;
					$('#overlay').fadeOut(400); // скрывaем пoдлoжку
				}
			);
	});
});
</script>
@endsection