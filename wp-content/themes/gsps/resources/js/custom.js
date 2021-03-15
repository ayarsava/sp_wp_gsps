import 'alpinejs';
import AOS from 'aos';
import Swiper from 'swiper';
import SwiperCore, { Navigation, Pagination } from 'swiper/core';
// configure Swiper to use modules
SwiperCore.use([Navigation, Pagination]);

AOS.init();

// init Swiper:
const swiper = new Swiper('.swiper-container', {
    slidesPerView: 1.1,
    spaceBetween: 20,
    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
    },
    breakpoints: {
    640: {
        slidesPerView: 2,
        spaceBetween: 20,
    },
    768: {
        slidesPerView: 4,
        spaceBetween: 20,
    },
    1024: {
        slidesPerView: 3,
        spaceBetween: 20,
    },
    }
});

jQuery(function ($) {
    var delay = 0;
    $('.resource-item').each(function() {
        delay = delay + 100;
        $(this).attr('data-aos-delay', delay);
    });
});
