@extends('layouts.admin_main')
@section('content')
@if(Session::has('flash_message'))
	<div class="alert alert-success" style="text-align: center;"> 
		{{ Session::get('flash_message') }} 
	</div> 
@endif
<div class="col-lg-10">
	<div class="x_panel">
		<div class="operator_text2" style="text-align: center;">Оберіть фото:</div>
		<div class="">
			<form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
				<div class="form-group operator_text2">
					<label for="place_id">Місце</label>
					<select id="place_id" name="place_id" class="form-control" required>
						<option></option>
						@foreach($places as $place)
							<option value="{{$place->id}}">{{$place->address}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group operator_text2">
					<label for="image">Зображення</label>
					<input type="file" id="image" multiple name="image" class="form-control">
				</div>
				<div class="form-group operator_text2" style="margin-top: 30px;">
					<button type="submit" class="btn btn-success btn-lg">
						Додати фото
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection

