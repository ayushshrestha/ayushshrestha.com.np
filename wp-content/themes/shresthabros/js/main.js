$(document).ready(function() {

    //AOS.init();
    //AOS.refresh();

    $('.slick-one').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplaySpeed:6000,
        focusOnSelect: true,
        autoplay: true,
        speed: 1000,
        arrows: false,
        dots: false,
        fade: true,
        asNavFor: '.slick-one_sync'
    }); 
    $('.slick-one_sync').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplaySpeed:6000,
        focusOnSelect: true,
        autoplay: true,
        speed: 1000,
        arrows: false,
        dots: false,
        fade: true,
        asNavFor: '.slick-one'
    });
    

    $('.slick-two').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplaySpeed:6000,
        focusOnSelect: true,
        autoplay: true,
        speed:3000,
        arrows: true,
        dots: false,
        //centerMode: true,
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    vertical: false,
                }
            }
        ]
    }); 
    

    $('.slick-three').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplaySpeed:6000,
        focusOnSelect: true,
        autoplay: true,
        speed: 1000,
        arrows: true,
        dots: false,
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 1,
                    vertical: false,
                }
            }
        ]
    }); 
    


    function resize(){
        var HeaderH = $('header').outerHeight();
        var WindowH = $(window).outerHeight();
        $('.hero_banner').css('height', WindowH - HeaderH);
    }

    $(window).on("load resize scroll",function(e){
        resize();
    });

});