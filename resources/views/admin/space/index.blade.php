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
	        <h2>Таблиця <small>Простри(зали, кімнати)</small></h2>
	        <ul class="nav navbar-right panel_toolbox">
	            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
	            </li>
	            <li class="dropdown">
	                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
	                   aria-expanded="false"><i class="fa fa-wrench"></i></a>
	                <ul class="dropdown-menu" role="menu">
	                	<li>
							{{Html::link(route('space.create'), 'Додати',['class' => 'add-place btn btn-success btn-sm'])}}
						</li>
	                </ul>
	            </li>
	            <li><a class="close-link"><i class="fa fa-close"></i></a>
	            </li>
	        </ul>
	        <div class="clearfix"></div>
        </div>
	@if (count($spaces) > 0)
	<div class="x_content">
		<table class="table table-bordered" style="text-align:center">
			<thead>
				<tr class="oper_table">
					<td>Місто</td>
					<td>Адреса</td>
					<td>Назва Місця</td>
					<td>Назва Простору(кімната, зал)</td>
					<td>Початок робочого дня</td>
					<td>Закінчення робочого дня</td>
					<td>Кількість місць</td>
					<td>Опції</td>
				</tr>
			</thead>
			<tbody>
				@foreach($spaces as $space)
					<tr>
						@if($space->getCity())<td>{{$space->getCity()->name}}</td>@else<td>  </td>@endif
						@if($space->place)<td>{{$space->place->address}}</td>@else<td>  </td>@endif
						@if($space->place)<td>{{$space->place->name}}</td>@else<td>  </td>@endif
						<td>{{ $space->name_space }}</td>
						@if($space->place)<td>{{$space->place->start_time}}</td>@else<td>  </td>@endif
						@if($space->place)<td>{{$space->place->end_time}}</td>@else<td>  </td>@endif
						<td>{{ $space->number_of_seats }}</td>
						<td>
							{{Form::model($space, array('route' => array('space.destroy', $space->id),'method' => 'DELETE')) }}
							<div class="btn-group col-md-8 col-md-offset-2 no-padding">
								{{Html::link( route('space.edit', ['id' => $space->id]), 'Змінити',['class' => 'btn btn-primary btn-xs ', 'style' => 'width: 45%; font-size:14px'])}}
								{{Form::button('Видалити <i class="fa fa-minus-square"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'style' => 'width: 55%;font-size:14px')) }}
							</div>
							{{Form::close()}}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	@endif
    </div>
</div>
@endsection
