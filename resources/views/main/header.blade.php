<header class="header ">
  <div class="logo">
    <a href={{url('/')}}>
      <img src="{{asset('images/header/logo.png')}}" alt="logo" class="img-logo">
    </a>
  </div>
  <div class=" nav-dropdown" >
    <div class="dropdown">
      <span class="dropbtn glyphicon glyphicon-menu-hamburger"></span>
      <div class="dropdown-content">
        <ul>
          <li class="current"><a href="{{ url('/') }}">ГОЛОВНА</a></li>
          <li><a href="{{ url('/place') }}">ПРОСТІР</a></li>
          <li><a href="{{ url('/price') }}">ВАРТІСТЬ</a></li>
          <li><a href="/#to-order">ЗАМОВИТИ</a></li>
          <li><a href="{{ url('/contacts') }}">КОНТАКТИ</a></li>
          {{--<li>@if (Auth::guest())--}}
              {{--<a href="{{ url('/login') }}">ВХІД</a>--}}
            {{--@else--}}
              {{--<a href="{{ url('/logout') }}"--}}
                 {{--onclick="event.preventDefault();--}}
                 {{--document.getElementById('logout-form').submit();">--}}
                {{--ВИХІД--}}
              {{--</a>--}}

              {{--<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">--}}
                {{--{{ csrf_field() }}--}}
              {{--</form>--}}
        {{--</ul>--}}
        {{--@endif</li>--}}
        </ul>
      </div>
    </div>
  </div>

  <div class="main-menu-list">
    <ul>
      <li class="current"><a href="{{ url('/') }}">ГОЛОВНА</a></li>
      <li><a href="{{ url('/place') }}">ПРОСТІР</a></li>
      <li><a href="{{ url('/price') }}">ВАРТІСТЬ</a></li>
      <li><a href="{{ url('/contacts') }}">КОНТАКТИ</a></li>
    </ul>
      {{--@if (Auth::guest())--}}
        {{--<li><a href="{{ url('/login') }}">ВХІД</a></li>--}}
      {{--@else--}}
        {{--<li>--}}
          {{--<a href="{{ url('/logout') }}"--}}
             {{--onclick="event.preventDefault();--}}
             {{--document.getElementById('logout-form').submit();">--}}
            {{--ВИХІД--}}
          {{--</a>--}}

          {{--<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">--}}
            {{--{{ csrf_field() }}--}}
          {{--</form>--}}
        {{--</li>--}}

    {{--</ul>--}}
    {{--@endif--}}
  </div>
</header>
