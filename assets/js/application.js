$(document).ready(function() {
    $('.row').on('click','button',function(event){
        event.preventDefault();
        $('body').find('.main-body').slideToggle();
        $(window).scrollTop($('.main-body').offset().top);
         $("body, html").animate({ 
            scrollTop: $( $(this).attr('href') ).offset().top 
        }, 900);
    });
});