$(document).ready(function() {
    $('.row').on('click','button',function(){
        $('body').find('.main-body').slideToggle();
        $(window).scrollTop($('.main-body').offset().top);
    });
});