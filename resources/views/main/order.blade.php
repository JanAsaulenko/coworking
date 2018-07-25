<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ asset('/assets/css/order-block.css') }}"/>
<script src="{{ asset('/assets/js/View_main.js') }}"></script>
<script src="{{ asset('/assets/js/DataPickerUA.js') }}"></script>

<div class="order">
  <div class="sizeof-video">
    <video id="video" loop preload="auto" muted poster="assets/4p.png" autoplay
           style="position: absolute; right: 0; bottom: 0; min-width: 100%; min-height: 100%; width: auto; height: auto; z-index: -1000;  ">
      <source src="{{ asset('/assets/video/Office.mp4') }}" type="video/webm">
    </video>
    <div class="block-on-video">
      <div class="main-titles">
        <h1>РОБОЧІ ТА НАВЧАЛЬНІ ПРОСТОРИ</h1>
        <div class="swiper-in-block">
          <div class="swiper-wrapper wrapper-in-block">
            <div class="swiper-slide swiper-in-block-slide">
              <div class="title-inblock"> З командою програм1ст1в</div>
            </div>
            <div class="swiper-slide swiper-in-block-slide">
              <div class="title-inblock"> Створеннн1 на эвропейському досв1д1</div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="order-block">
      <!--block with button , witch will be slide left when button push-->
      <div class="block-with-button">
        <div class="col-offset-2 col-md-12">
          <button id="order-btn">ЗАМОВИТИ</button>
        </div>
      </div>
      <!--block witch form Place with inputs for ordering place-->
      <div class="block-with-form">

        <select title="city" class="target" id="town-select" name="town" form="first-form" required>
          <option selected="selected"></option>
          @foreach($cities as $city)
            <option  value="{{$city->id}}">{{$city->name}}</option>
          @endforeach
        </select>

        <div class="calendar">
          <input type="text" id="from" class="date-pck" name="fromdate" form="first-form" placeholder="Дата з..." required>
          <input type="text" id="to" class="date-pck" name="todate" form="first-form" placeholder="Дата по..." required>
        </div>
        <div>
          <legend>Доступні простори:</legend> <!-- DO NOT FIX/ADD LINES HERE -->
          <select id="place-select" name="place" form="first-form" required>
            <option></option>
          </select>
        </div>

        <legend>Кількість місць:</legend><!-- DO NOT FIX/ADD LINES HERE -->
        <div class="count-places">
          <button id="minus-btn">-</button>
          <input id="num-of-places-input" type="text" form="first-form" name="places" value="1" maxlength="2" required>
          <button id="plus-btn">+</button>
        </div>
        <div>
          <select id="discount-selector" form="first-form" name="discount" required>
            @foreach($discountTypes as $discountType)
              <option value="{{$discountType->id}}" @if ($discountType->id == '1') {{'selected'}} @endif>
                {{$discountType->discountname}}
              </option>
            @endforeach
          </select>
        </div>
        <div id="promo-code-div">
          <legend>Промокод:</legend>
          <input id="promo-code" type="text" name="pr-code" form="first-form" value="" maxlength="8">
        </div>
        <div class="arrows">
          <button id="order-back-btn" type='button'><--</button>
          <button id="first-form-submit" type="submit" name="OK" form="first-form">--></button>
        </div>
      </div>
    </div>
  </div>
</div>


<form id="first-form" action="reservation" method="POST" name='test'>
  <input type='hidden' name="_token" value="{{csrf_token()}}">
</form>
<!-- this is an anchor -->


<script>
  var swiper = new Swiper('.swiper-in-block', {
    spaceBetween: 1,
    centeredSlides: true,
    speed: 3000,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    }

  });
</script>
