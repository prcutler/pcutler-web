/*!
 * StrapPress Extras
 */
// Placeholder
jQuery(function(){
     jQuery("a[rel=popover]")
      .popover()
      .click(function(e) {
        e.preventDefault()
      });

      jQuery("a[rel=tooltip]").tooltip();

});



jQuery.noConflict()(function($){
// cache container
var $container = $('#portfolio-list');
// initialize isotope
$container.imagesLoaded( function(){
$container.isotope({
	itemSelector : '.block',
	layoutMode : 'fitRows'
});
});

// filter items when filter link is clicked
$('#portfolio-filter a').click(function(){
	var selector = $(this).attr('data-filter');
	$container.isotope({ filter: selector });
	  $('a.active').removeClass('active');
        $(this).addClass('active');
	return false;
});
});