window.onload = (function(){
    $('#header').css('height', $('.header-image').height());
});  
$(document).ready(function(){
    $(window).resize(function(){
        $('#header').css('height', $('.header-image').height());
    });        
});



