<div class="container">
<ul class="nav nav-pills menu_admin">
	<li class="active">
		<a href="{{ route('operator') }}">Оператор</a>
	</li>
	<li>
		<a href="{{ route('place.index') }}">Місця для оренди</a>
	</li>
	<li>
		<a href="{{ route('price.index') }}">Тарифи</a>
	</li>
	<li>
		<a href="{{ route('discount.index') }}">Купони на знижку</a>
	</li>
	<li>
		<a href="{{ route('permissions.index') }}">Користувачі</a>
	</li>							
	<li>
		<a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
			Вихід
		</a>
		<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
			{{ csrf_field() }}
		</form>
	</li>
</ul>
</div>