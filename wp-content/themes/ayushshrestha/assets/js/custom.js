$(document).ready(function(){

    $(window).on("resize", function() {
        adjustHeight();
    });

    function adjustHeight(){
        var HeaderHeight = $('header').outerHeight();
        var WindowHeight = $(window).height();
        $('#hero').css('padding-top', HeaderHeight);
        $('#hero').css('height', WindowHeight - HeaderHeight);
    };

    adjustHeight();

    $('.hero-slick_title').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        arrows: false,
        autoplay: true,
        speed: 2400
    });

    
    $('.c-slider-slick').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        //fade: true,
        speed: 400,
        responsive: [{
            breakpoint: 991,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
                }
            },
            {
                breakpoint: 600,
                settings: {
                slidesToShow: 1,
                slidesToScroll: 1
                }
            }
        ]
    });	


    //var typed = $.HSCore.components.HSTyped.init(".js-text-animation");

    // tooltip
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })
    // tooltip ENDs

});