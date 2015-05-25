$(document).ready(function() {
<<<<<<< HEAD
    $('.row').on('click','button',function(){
        $('body').find('.main-body').slideToggle();
        $(window).scrollTop($('.main-body').offset().top);
=======
    $('.row').on('click','button',function(event){
        event.preventDefault();
        $('body').find('.main-body').slideToggle();
        $(window).scrollTop($('.main-body').offset().top);
         $("body, html").animate({ 
            scrollTop: $( $(this).attr('href') ).offset().top 
        }, 900);
>>>>>>> master
    });
});