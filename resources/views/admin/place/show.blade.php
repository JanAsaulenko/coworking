@extends('layouts.admin_main')
@section('content')
<meta name="_token" content="{!! csrf_token() !!}"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
@if(Session::has('flash_message'))
	<div class="alert alert-success" style="color:red; text-align: center;">
		{{ Session::get('flash_message') }}
	</div>
@endif
<div class="col-lg-10">
	<div class="operator_text2" style="text-align: center;">Інформація по позиції:</div>
	    <div class="x_content" style="margin-top: 20px;">
			<table class="table table-bordered" style="text-align:center">
				<thead>
				<tr class="oper_table">
					<td>Місто</td>
					<td>Адреса</td>
					<td>Назва закладу</td>
					<td>Час початку</td>
					<td>Час закінчення</td>
					<td>Кількість місць</td>
				</tr>
				</thead>
				<tbody>
				<tr class="test">
					<td>{{ $place->getCityName() }}</td>
					<td>{{ $place->address }}</td>
					<td>{{ $place->getPlaceName() }}</td>
					<td>{{ $place->start_time }}</td>
					<td>{{ $place->end_time }}</td>
					<td id="place-setplace">{{ $place-> countOfSeatPlaces() }}</td>
				</tr>
				</tbody>
			</table>

			<table class="table table-bordered" style="text-align:center">
				<thead>
				<tr class="oper_table">

					<td>Назва простору</td>
					<td>Час початку</td>
					<td>Час закінчення</td>
					<td>Кількість місць</td>
				</tr>
				</thead>
				<tbody>

				@foreach( $spaces as $space )
				<tr class="test">
					<td>{{ $space->name_space }}</td>
					<td> 08:00:00</td>
					<td> 20:00:00</td>
					<td id="place-setplace">{{ $space->number_of_seats }}</td>
				</tr>
				@endforeach

				</tbody>
			</table>

			<div class="operator_text2" style="margin-bottom: 20px;">Додаткові функції:</div>
	 		<button type="submit" class="btn btn-success btn-lg">
	 			{{ Html::link( route('permissions.index'), 'Привілегії користувачів') }}
	 		</button>
	 		<button id="send" type="submit" class="btn btn-success btn-lg">
	 			{{ Html::link( route('image.create'), 'Додати фото') }}<br>
	 		</button>
	 	 	<ul class="dropdown-menu" role="menu">
	            <li>
	                {{Html::link(route('permissions.create'), 'Додати',['class' => 'btn btn-success btn-lg'])}}
	            </li>
        	</ul>
	 		<br>
	 		@if (count($images) > 0)
				@foreach($images as $image)
					<img src="/images/catalog/{{$image->name}}">
				@endforeach
			@endif
		</div>
</div>
@endsection
