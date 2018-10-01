<header class="header ">
  <div class="logo">
    <a href={{url('/')}}>
      <img src="{{asset('images/header/logo.png')}}" alt="logo" class="img-logo">
    </a>
  </div>
  <div class="nav-dropdown">
    <div class="dropdown">
      <span class="dropbtn glyphicon glyphicon-menu-hamburger"></span>
      <div class="dropdown-content">
        <ul class="list">
          <li class="item"><a href="{{ url('/') }}">ГОЛОВНА</a></li>
          <li class="item"><a href="{{ url('/place') }}">ПРОСТІР</a></li>
          <li class="item"><a href="{{ url('/price') }}">ВАРТІСТЬ</a></li>
          <li class="item" ><a href="/#to-order">ЗАМОВИТИ</a></li>
          <li class="item"><a href="{{ url('/contacts') }}">КОНТАКТИ</a></li>
        </ul>
      </div>
    </div>
  </div>

  <div class="main-menu">
    <ul class="list">
      <li class="item"><a href="{{ url('/') }}">ГОЛОВНА</a></li>
      <li class="item"><a href="{{ url('/place') }}">ПРОСТІР</a></li>
      <li class="item"><a href="{{ url('/price') }}">ВАРТІСТЬ</a></li>
      <li class="item"><a href="{{ url('/contacts') }}">КОНТАКТИ</a></li>
    </ul>
  </div>
</header>
