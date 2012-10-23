//Header settings
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

//Countdown settings
$(function () {
	var confDay = new Date();
	confDay = new Date(confDay.getFullYear() + 1, 3 - 1, 22);
	$('#year').text(confDay.getFullYear());
	$('#noSeconds').countdown({until: confDay, format: 'dHM'});
});

