; (function ($) {
    "use strict";

    //* mainNavbar
    function mainNavbar() {
        if ($('#main_navbar').length) {
            $('#main_navbar').affix({
                offset: {
                    top: 10,
                    bottom: function () {
                        return (this.bottom = $('.footer').outerHeight(true))
                    }
                }
            });
        };
    };



    //*  Main slider js 
    function home_main_slider() {
        if ($('.slider_inner').length) {
            $('.slider_inner').camera({
                loader: true,
                navigation: true,
                autoPlay: false,
                time: 4000,
                playPause: false,
                pagination: false,
                thumbnails: false,
                overlayer: true,
                hover: false,
                minHeight: '500px',
            });
        }
    }


    //* Stellar 

    //* counterUp JS
    function counterUp() {
        if ($('.counter').length) {
            $('.counter').counterUp({
                delay: 10,
                time: 900,
            });
        }
    };


    //* counterUp 2 JS
    function counterUp2() {
        if ($('.counter2').length) {
            $('.counter2').counterUp({
                delay: 10,
                time: 200,
            });
        }
    };

    //* Hide Loading Box (Preloader)
    function preloader() {
        if ($('.preloader').length) {
            $(window).load(function () {
                $('.preloader').delay(100).fadeOut('fast');
                $('body').delay(100).css({ 'overflow': 'visible' });
            });
        }
    };

    /*Function Calls*/

    new WOW().init();
    home_main_slider();
    counterUp();
    counterUp2();
    mainNavbar();
    preloader();

})(jQuery);