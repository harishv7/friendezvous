var open = false;
$(document).ready(function() {
    $('.row').on('click','button',function(event){
        if (open == false){
            event.preventDefault();
            $('body').find('.main-body').fadeIn();
            $(window).scrollTop($('.main-body').offset().top);
            $("body, html").animate({ 
                scrollTop: $( $(this).attr('href') ).offset().top 
            }, 900);
            open = true;
        }
    });
    $('.close').on('click','.close-button',function(){
         $('body').find('.main-body').fadeOut();
            $("body, html").animate({ 
                scrollTop: $( $(this).attr('href') ).offset().top 
            }, 900);
    });
});
