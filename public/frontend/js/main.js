(function ($) {

    "use strict";


    $(window).load(function () {
        $('.preloader').fadeOut(1000);
    });

    $(".slider").pgwSlider({
        autoSlide: false
    });

    $(".slider-2").pgwSlideshow();

    $(".video-carousel").owlCarousel({
        loop: true,
        margin: 30,
        nav: true,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 2
            },
            768: {
                items: 3
            },
            992: {
                items: 4
            }
        }
    });

    // Youtube Video Bg

    var bgvideo = $(".bgvideo");

    if (bgvideo.length > 0) {

        bgvideo.YTPlayer({
            videoURL: 'https://www.youtube.com/watch?v=iNJdPyoqt8U',
            containment: '.video-area',
            quality: 'large',
            autoPlay: true,
            mute: true,
            opacity: 1

        });
    }


    // Google Map For Contact Page

    function contactPageMap() {
        var map;
        var mapId = document.getElementById("map-id");
        var latlng = new google.maps.LatLng(lat, long);

        map = new google.maps.Map(mapId, {
            center: latlng,
            zoom: 13,
            scrollwheel: false
        });

        var marker = new google.maps.Marker({
            position: latlng,
            map: map,
            title: "Sydney",
            animation: google.maps.Animation.BOUNCE,
            icon: "frontend/images/map/mobile-phones.png"

        });


    }

    if ($("#map-id").length > 0) {

        contactPageMap();
    }


    // Scroll Top

    function scrolltop() {
        var wind = $(window);
        wind.on("scroll", function () {
            var scrollTop = $(window).scrollTop();
            if (scrollTop >= 500) {
                $(".scroll-top").fadeIn("slow");
            } else {
                $(".scroll-top").fadeOut("slow");
            }

        });

        $(".scroll-top").on("click", function () {
            var bodyTop = $("html, body");
            bodyTop.animate({scrollTop: 0}, 800, "easeOutCubic");
        });

    }
    scrolltop();



    $(function () {
        $('img.lazy').Lazy({
            placeholder: "data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==",
            effect: "fadeIn",
            effectTime: 2000,
            threshold: 0
        });
    });

    function alertsMsg() {
        var i;
        for (i = 1; i < 10; i++) {
            if ($(".custom-alert-" + i).length > 0 && i > 1) {
                $(".custom-alert-" + i).show();
            } else if (i == 1) {
                $(".custom-alert-1").show();
            } else {
                return false;
            }
        }
    }
    $(document).on('ready', function () {
        alertsMsg();
        setTimeout(function () {
            $(".custom-alert").hide();
        }, 6000);
    });


})(jQuery);