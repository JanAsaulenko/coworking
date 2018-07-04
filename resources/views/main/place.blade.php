<div class="place">
  <div class="prostir row">
    <div class="col-sm-12">
      <h3>TIME/ON ЦЕ ПРОСТІР ДЛЯ ВАШОГО РОЗВИТКУ</h3>
      <p><img src="{{ asset('assets/css/2prostir/line.png') }}" alt=""></p>
      <p> місце, де зустрічаються якість,
        можливість та пристрасть, щоб сприяти розвитку</p>
    </div>
  </div>

  <div class="swiper-container">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
      <!-- Slides -->
      <div class="swiper-slide" id="1">
        <img src="{{ asset('assets/css/3carousel/photo1.png') }}">
        <div class="swiper-elements ">
          <h1>Sea Room</h1>
          <button class="cabinet-info">Read more ></button>
        </div>
      </div>
      <div class="swiper-slide" id='2'>
        <img src="{{ asset('assets/css/3carousel/photo2.png') }}">
        <div class="swiper-elements">
          <h1>Square space</h1>
          <button class="cabinet-info">Read more ></button>
        </div>
      </div>
      <div class="swiper-slide" id='3'>
        <img src="{{ asset('assets/css/3carousel/photo3.png') }}">
        <div class="swiper-elements">
          <h1> Magenta Room</h1>
          <button class="cabinet-info">Read more ></button>
        </div>
      </div>
      </div>
    </div>
    <!-- If we need pagination -->
    <div class="swiper-pagination"></div>
  </div>
</div>


<div class="modal fade bs-example-modal-lg" id="imagemodal" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg text-center" role="document" style="padding: 0">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body" style="">
        <img src="" class="imagepreview modal-content"/>
      </div>
    </div>
  </div>
</div>
</div>
<script>
    var swiper = new Swiper('.swiper-container', {
        effect: 'coverflow',
        spaceBetween: 70,
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 3,
        parallax: true,
        speed: 5000,
        coverflowEffect: {
            rotate: 50,
            stretch: 4,
            depth: 500,
            modifier: 1,
            slideShadows: true,
        },

        pagination: {
            el: '.swiper-pagination',
            hideOnClick: true
        },
        // autoplay: {
        //     delay: 500
        // },
        fadeEffect: {
            crossFade: true
        }
    });

    swiper.on('transitionStart', function () {
        var activeSlide = swiper.slides[swiper.activeIndex];
        var slidesArray = swiper.slides;
        for (var i = 0; i < slidesArray.length; i++) {
            console.log('slideArray= ', slidesArray[i].id);
            console.log('active= ', activeSlide.id);
            if (slidesArray[i].id === activeSlide.id) {
                console.log('active')

                slidesArray[i].children[1].removeAttribute('class');
            }
            else {
                swiper.slides[i].children[1].setAttribute('class', 'swiper-elements')

                // swiper.zoom.in;
            }
        }
    })


</script>


<script>
    $(function () {
        $('.cabinet-info').on('click', function () {
            // $('.imagepreview').attr('src', $(this).find('img').attr('src'));
            $('#imagemodal').modal('show');
        });
    });
</script>

