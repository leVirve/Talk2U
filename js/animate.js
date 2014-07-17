$(function () {
	
	var coverElement = $('.cover');
	if(coverElement.hasClass('bounceInLeft')) {
		console.log("Animated");
		setTimeout(function() {
            coverElement.removeClass('bounceInLeft').addClass('fadeOutRight');
        }, 1000);
        setTimeout(function() { 
        	coverElement.addClass('hidden');
        	$('#mid').removeClass('hidden').addClass('fadeIn animated');
        }, 1600);
	}


});