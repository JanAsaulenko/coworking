import Swiper from 'swiper';
import drawSpaceName from '../actions/main_page/drawSpaceName';

let swipe = new Swiper('.swiper-container', {
    effect: 'coverflow',
    spaceBetween: 100,
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: 3,
    speed: 5000,
    // coverflowEffect: {
    //     rotate: 50,
    //     stretch: 4,
    //     depth: 500,
    //     modifier: 1,
    //     slideShadows: true,
    // },
    zoom: {
        maxRatio: 2,
        toggle: true
    },
    // autoplay: {
    //     delay: 500
    // },
    fadeEffect: {
        crossFade: true
    }
});

swipe.on('transitionStart', function () {
    let activeSlide = swipe.slides[swipe.activeIndex];
    let slidesArray = swipe.slides;
    for (let i = 0; i < slidesArray.length; i++) {
        if (slidesArray[i].id === activeSlide.id) {
            drawSpaceName(slidesArray[i])
        }
    }
});

swipe.on('doubleTap', (event) => {
    console.log('event', event)
});


let swiper = new Swiper('.swiper-container2', {
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
        renderBullet: function (index, className) {
            return '<span class="' + className + '">' + (index + 1) + '</span>';
        },
    },
});


