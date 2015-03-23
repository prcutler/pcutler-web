jQuery.noConflict();
(function($) {
$(function() {
	$(window).scroll(function() {
		var distanceTop = $('#wpfr_anchor').offset().top - $(window).height();
		if  ($(window).scrollTop() > distanceTop) {
			$('#wpfr_slidebox_right').animate({'right': '0px'});
		} else {
			$('.wpfr_slidebox').stop(true);
			var rightSlideboxShift = 2 * $('#wpfr_slidebox_right').width();
			$('#wpfr_slidebox_right').animate({'right': '-' + rightSlideboxShift + 'px'}, 200);	
		}
	});
	$('.wpfr_slidebox .close').bind('click',function() {
		$(this).parent().remove();
	});
});
})(jQuery);