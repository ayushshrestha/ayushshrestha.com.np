$(document).ready(function(){
    $('.slider-slick').slick({
        infinite: true,
        speed: 300,
        slidesToShow: 1
      });


    var $searchForm = $('.block-search_form')
    $('.trigger').on('click', function() {
      $searchForm.toggleClass("block-search_show");
    });
    $('.block-search_form .close').on('click', function() {
      $searchForm.removeClass("block-search_show");
    });
    $('.mobile-menu-close').on('click', function() {
      $('.main-navigation').removeClass("toggled");
    });


});