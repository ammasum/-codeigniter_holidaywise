// client carousel 
$("#client_carousel").owlCarousel({
        loop:true,
        autoplay: 2000,
        autoplayHoverPause:true,
        smartSpeed: 700,
        items: 6,
        margin:30,
        dots: false,
        nav:true,
        navText: [
          '<i class="flaticon-back-1"></i>',
          '<i class="flaticon-next"></i>'
        ],
        responsive:{
          0:{
            items:2
          },
          480:{
            items:3
          },
          600:{
            items:3
          },
          800:{
            items:4
          },
          1024:{
            items:6
          },
          1200:{
            items:6
          }
        }
    });
// counter up
jQuery(document).ready(function($) {
            $('.counter').counterUp({
                delay: 60,
                time: 1000
            });
        });
//wow js for animate .css
              new WOW().init();
