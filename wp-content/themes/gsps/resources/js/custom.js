import 'alpinejs';
import AOS from 'aos';
import Swiper from 'swiper';
import SwiperCore, { Navigation, Pagination } from 'swiper/core';
import * as tocbot from 'tocbot';
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
    var firstLottie = document.getElementById("firstLottie");
    var secondLottie = document.getElementById("secondLottie");
    var thirdLottie = document.getElementById("thirdLottie");
    if(firstLottie){
        LottieInteractivity.create({
            mode: 'scroll',
            player: '#firstLottie',
            actions: [
            {
                visibility: [0,1],
                type: 'seek',
                frames: [0, 200],
            },
            ],
        })
    };
    if(secondLottie){
        LottieInteractivity.create({
            mode: 'scroll',
            player: '#secondLottie',
            actions: [
            {
                visibility: [0,1],
                type: 'seek',
                frames: [0, 227],
            },
            ],
        })
    };
    if(thirdLottie){
        LottieInteractivity.create({
            mode: 'scroll',
            player: '#thirdLottie',
            actions: [
            {
                visibility: [0,1],
                type: 'seek',
                frames: [0, 150],
            },
            ],
        });
    };

    // Add aos delay to items with .resource-item class
    var delay = 0;
    $('.resource-item').each(function() {
        delay = delay + 100;
        $(this).attr('data-aos-delay', delay);
    });

    // Add Table of contents to pages
    tocbot.init({
        // Where to render the table of contents.
        tocSelector: '.js-toc',
        // Where to grab the headings to build the table of contents.
        contentSelector: '.entry-content',
        // Which headings to grab inside of the contentSelector element.
        headingSelector: 'h2, h3, h4, h5, h6',
        // For headings inside relative or absolute positioned containers within content.
        hasInnerContainers: true,
        headingsOffset: 140,
        scrollSmoothOffset: -140
    });
    tocbot.refresh();
    
    
});
