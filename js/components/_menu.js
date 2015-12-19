/*

	Basic Menu Behavior
	Activate clicked on menu item. Deactivate active one
 
 */

$(document).ready(function(){
	var linkSelector = '.navigation__link';

	$(linkSelector).on('click',function(e){

		// prevent default action
		e.preventDefault();

		// remove active state from other menu item
		$(linkSelector+'.active').removeClass('active');

		// make clicked on item active
		$(this).addClass('active');

		// jump page down a bit to accomodate fixed header

		var $headerHeight = $('#header').outerHeight();
		var $targetTop = $($(this).find('a').attr('href')).offset().top - $headerHeight;
		console.log($targetTop);

		$('html, body').animate({
		        scrollTop: $targetTop
		}, 500);

	});

});