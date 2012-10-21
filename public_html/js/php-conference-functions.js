window.onload = (function(){
    $('#header').css('height', $('.header-image').height());
    $('.ticket-image').css('height', $('#bar-below-header').height() + 0.5 * $('#bar-below-header').height());
    $('.ticket-image').css('margin-top',  -0.25 * $('#bar-below-header').height());    
});  
$(document).ready(function(){
    $(window).resize(function(){
        $('#header').css('height', $('.header-image').height());
        $('.ticket-image').css('height', $('#bar-below-header').height() + 0.5 * $('#bar-below-header').height());
        $('.ticket-image').css('margin-top',  -0.25 * $('#bar-below-header').height());
    });        
});



