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
      <div class="block-with-button">
        <div class="col-offset-2 col-md-12">
          <button type="submit" name="OK" form="first-form" id="order-btn" >ЗАМОВИТИ</button>
        </div>
      </div>
    </div>
  </div>
</div>
      <form id="first-form" action="reservation" method="POST" name='test'>
        <input type='hidden' name="_token" value="{{csrf_token()}}">
      </form>


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
