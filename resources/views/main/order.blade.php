<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="order">
  <div class="sizeof-video">
    <video id="video" loop preload="auto" muted autoplay
           style="position: absolute; right: 0; bottom: 0; min-width: 100%; min-height: 100%; width: auto; height: auto; z-index: -1000;  ">
      <source src="{{ asset('video/Office.mp4') }}" type="video/webm">
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

    <div class="block">
      <!--block with button , witch will be slide left when button push-->
      <div class="block-with-button">
        <div class="col-offset-2 col-md-12">
          <button type="submit" name="OK" form="first-form" id="order-btn" type="submit">ЗАМОВИТИ</button>
        </div>
      </div>
    </div>
  </div>
</div>
      <form id="first-form" action="reservation" method="POST" name='test'>
        <input type='hidden' name="_token" value="{{csrf_token()}}">
      </form>
      <!--block witch form Place with inputs for ordering place-->
      {{--<div class="block-with-form">--}}
        {{--<div class="calendar">--}}
          {{--<input type="text" id="fromMain" class="date-pck" name="fromdate" form="first-form" placeholder="Дата з..."--}}
                 {{--required>--}}
          {{--<select title="city" class="target" id="town-select" name="town" form="first-form" required>--}}
            {{--<option selected="selected" style="text-align:center; align-items: center">Оберiть мiсто</option>--}}
            {{--@foreach($cities as $city)--}}
              {{--<option value="{{$city->id}}">{{$city->name}}</option>--}}
            {{--@endforeach--}}
          {{--</select>--}}
          {{--<input type="text" id="toMain" class="date-pck" name="todate" form="first-form" placeholder="Дата по..." required>--}}
        {{--</div>--}}
        {{--<div>--}}
          {{--<select id="place-select" name="place" form="first-form" required>--}}
            {{--<option></option>--}}
          {{--</select>--}}
        {{--</div>--}}

        {{--<label class="legend">Кількість місць:</label><!-- DO NOT FIX/ADD LINES HERE -->--}}
        {{--<div class="count-places">--}}
          {{--<button class="button" id="minus-btn">-</button>--}}
          {{--<input id="num-of-places-input" type="text" form="first-form" name="places" value="1" maxlength="2" required>--}}
          {{--<button class="button" id="plus-btn">+</button>--}}
        {{--</div>--}}
        {{--<div>--}}
          {{--<label for="discount-selector">Знижки</label><select id="discount-selector" form="first-form" name="discount" required>--}}
            {{--@foreach($discountTypes as $discountType)--}}
              {{--<option value="{{$discountType->id}}" @if ($discountType->id == '1') {{'selected'}} @endif>--}}
                {{--{{$discountType->discountname}}--}}
              {{--</option>--}}
            {{--@endforeach--}}
          {{--</select>--}}
        {{--</div>--}}
        {{--<div id="promo-code-div">--}}
          {{--<label for="promo-code">Промокод:</label><input id="promo-code" type="text" name="pr-code" form="first-form" value="" maxlength="8">--}}
        {{--</div>--}}

        {{--<div class="arrows">--}}
          {{--<button class="way-button" id="order-back-btn" type='button'>Назад</button>--}}
          {{--<button class="way-button" id="first-form-submit" type="submit" name="OK" form="first-form">Далi</button>--}}
        {{--</div>--}}
      {{--</div>--}}
    {{--</div>--}}
  {{--</div>--}}
{{--</div>--}}



<!-- this is an anchor -->


<script>
  let swiper = new Swiper('.swiper-in-block', {
    spaceBetween: 1,
    centeredSlides: true,
    speed: 3000,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    }

  });
</script>
