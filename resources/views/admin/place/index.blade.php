@extends('layouts.admin_main')
@section('content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
@if(Session::has('flash_message'))
	<div class="alert alert-success" style="text-align: center;">
		{{ Session::get('flash_message') }}
	</div>
@endif
<div class="col-lg-10">
	<div class="x_panel">
		<div class="x_title">
	        <h2>Таблиця <small>Місця для оренди</small></h2>
	        <ul class="nav navbar-right panel_toolbox">
	            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	            </li>
	            <li class="dropdown">
	                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
	                   aria-expanded="false"><i class="fa fa-wrench"></i></a>
	                <ul class="dropdown-menu" role="menu">
	                	<li>
							{{Html::link(route('place.create'), 'Додати',['class' => 'add-place btn btn-success btn-sm'])}}
						</li>
	                </ul>
	            </li>
	            <li><a class="close-link"><i class="fa fa-close"></i></a>
	            </li>
	        </ul>
	        <div class="clearfix"></div>
        </div>
	@if (count($cities) > 0)
	<div class="x_content">
		<table class="table table-bordered" style="text-align:center">
			<thead>
				<tr class="oper_table">
					<td>Місто</td>
					<td>Адреса</td>
					<td>Назва простору</td>
					<td>Spaces</td>
					<td>Час початку</td>
					<td>Час закінчення</td>
					<td>Загальна кількість місць</td>
					<td>Переглянути існуючі</td>
					<td>Видалити</td>
				</tr>
			</thead>
			<tbody>
				@foreach($cities as $city)
					@foreach($city->places as $place)
						<tr class="test" data-coords-lat="{{ $place->latitude }}" data-coords-lng="{{$place->longitude}}">
							<td>{{ $city->name }}</td>
							<td>{{ $place->address }}</td>
							<td>{{ $place->getPlaceName() }}</td>
							<td>
								@foreach ($place->spaces as $space)
									{{$space->name_space}}<br>
								@endforeach
							</td>
							<td>{{ $place->start_time }}</td>
							<td>{{ $place->end_time }}</td>
							<td id="place-setplace">{{ $place->countOfSeatPlaces() }}</td>
							<td><button type="submit" class="btn btn-success">
							{{Html::link( route('place.show', ['id' => $place->id]), 'Переглянути')}}</button>
							</td>
							<td>
							{{ Form::model($place, array('route' => array('place.destroy', $place->id),'method' => 'DELETE')) }}
							{{ Form::submit('Видалити', ['class' => 'btn btn-danger']) }}
							{{ Form::close() }}
							</td>
						</tr>
					@endforeach
				@endforeach
			</tbody>
		</table>
	</div>
	@endif
    </div>
</div>
@endsection
