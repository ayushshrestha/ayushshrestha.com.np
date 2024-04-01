$(document).ready(function() {

    //AOS.init();
    //AOS.refresh();

    $('.slick-one').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplaySpeed:1200,
        focusOnSelect: true,
        autoplay: true,
        speed: 1200,
        arrows: false,
        dots: false,
        fade: true,
        asNavFor: '.slick-one_sync'
    }); 
    $('.slick-one_sync').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplaySpeed:1200,
        focusOnSelect: true,
        autoplay: true,
        speed: 1200,
        arrows: false,
        dots: false,
        fade: true,
        asNavFor: '.slick-one'
    });
    
    $('.slick-one--half').slick({
        slidesToShow: 1.5,
        slidesToScroll: 1,
        autoplaySpeed:1200,
        focusOnSelect: true,
        autoplay: true,
        speed: 1200,
        arrows: true,
        dots: true
    }); 


    $('.slick-two').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplaySpeed:4000,
        focusOnSelect: true,
        autoplay: true,
        speed:2500,
        arrows: true,
        dots: false,
        //centerMode: true,
        responsive: [
            {
                breakpoint: 1025,
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
        autoplaySpeed:1200,
        infinite: false,
        focusOnSelect: true,
        autoplay: false,
        speed: 1200,
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

    $('.slick-four').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplaySpeed:1200,
        focusOnSelect: true,
        autoplay: true,
        speed: 1200,
        arrows: true,
        dots: false,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                }
            },
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

    Sharect.config({
            facebook: true,
            twitter: true,
            twitterUsername: 'ayushshrestha',
            backgroundColor: '#667EEA',
            iconColor: '#FFF',
            selectableElements: ['p'],
        }).init()

});