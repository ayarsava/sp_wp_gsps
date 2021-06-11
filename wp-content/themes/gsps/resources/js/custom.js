import 'alpinejs';
import AOS from 'aos';
import Swiper from 'swiper';
import SwiperCore, { Navigation, Pagination } from 'swiper/core';
import tocbot from 'tocbot';
// configure Swiper to use modules
SwiperCore.use([Navigation, Pagination]);



// init Swiper:
const swiper = new Swiper('.swiper-container', {
    slidesPerView: 1.2,
    spaceBetween: 20,
    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
    },
    breakpoints: {
    640: {
        slidesPerView: 2.2,
        spaceBetween: 20,
    },
    768: {
        slidesPerView: 2.2,
        spaceBetween: 20,
    },
    1024: {
        slidesPerView: 3.2,
        spaceBetween: 20,
    },
    }
});

jQuery(function ($) { 
    var firstLottie = document.getElementById("firstLottie");
    var secondLottie = document.getElementById("secondLottie");
    var thirdLottie = document.getElementById("thirdLottie");
    var people1Lottie = document.getElementById("people1Lottie");
    var people2Lottie = document.getElementById("people2Lottie");
    var people3Lottie = document.getElementById("people3Lottie");
    var people4Lottie = document.getElementById("people4Lottie");
    var people5Lottie = document.getElementById("people5Lottie");
    if(firstLottie){
        LottieInteractivity.create({
            mode: 'scroll',
            player: '#firstLottie',
            actions: [
            {
                visibility: [0,0.5],
                type: 'seek',
                frames: [0, 50],
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
                frames: [0, 50],
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
                visibility: [0.3,0.9],
                type: 'seek',
                frames: [0, 150],
            },
            ],
        });
    };
    if(people1Lottie){
        LottieInteractivity.create({
            mode: 'scroll',
            player: '#people1Lottie',
            actions: [
            {
                visibility: [0,1],
                type: 'seek',
                frames: [0, 50],
            },
            ],
        });
    };
    if(people2Lottie){
        LottieInteractivity.create({
            mode: 'scroll',
            player: '#people2Lottie',
            actions: [
            {
                visibility: [0.3,0.9],
                type: 'seek',
                frames: [0, 10],
            },
            ],
        })
    };
    if(people3Lottie){
        LottieInteractivity.create({
            mode: 'scroll',
            player: '#people3Lottie',
            actions: [
            {
                visibility: [0,1],
                type: 'seek',
                frames: [0, 50],
            },
            ],
        });
    };
    if(people4Lottie){
        LottieInteractivity.create({
            mode: 'scroll',
            player: '#people4Lottie',
            actions: [
            {
                visibility: [0,1],
                type: 'seek',
                frames: [0, 50],
            },
            ],
        });
    };
    if(people5Lottie){
        LottieInteractivity.create({
            mode: 'scroll',
            player: '#people5Lottie',
            actions: [
            {
                visibility: [0,1],
                type: 'seek',
                frames: [0, 50],
            },
            ],
        });
    };
    
    if($('.resource-item').length) {
        // Add aos offset to items with .resource-item class
        var offset = 0;
        $('.resource-item h4').each(function() {
            offset = offset + 100;
            $(this).attr('data-aos-offset', offset);
        });
    }

    if($('.js-toc').length) {
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
    }

// Filter
    $('#filter').submit(function(){
        var filter = $('#filter');
        $.ajax({
            url:filter.attr('action'),
            data:filter.serialize(), // form data
            type:filter.attr('method'), // POST
            beforeSend:function(xhr){
                filter.find('button').text('Processing...'); // changing the button label
            },
            success:function(data){
                filter.find('button').text('Apply filter'); // changing the button label back
                $('#response').html(data); // insert data
            }
        });
        return false;
    });
    
    
    AOS.init({
        startEvent: 'load',
    });
});