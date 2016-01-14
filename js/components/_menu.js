/*

	Basic Menu Behavior
	Activate clicked on menu item. Deactivate active one
 
 */

$(document).ready(function(){

	var linkSelector = '.navigation__link';

	var activateSection = function(section){
		
		// remove active state from other menu item
		$(linkSelector+'.active').removeClass('active');	

		// make clicked on item active
		section.addClass('active');
	}

	/*
		manage internal section browsing
	 */

	$(linkSelector).on('click',function(e){

		// prevent default action
		e.preventDefault();

		activateSection($(this));

		// jump page down a bit to accomodate fixed header

		var $headerHeight = $('#header').outerHeight();
		var $targetTop = $($(this).find('a').attr('href')).offset().top - $headerHeight;
		console.log($targetTop);

		$('html, body').animate({
		        scrollTop: $targetTop
		}, 500);

	});

	/*
		Toggle Mobile Menu
	 */

	 $('.navigation__mobile_toggle').on('click', function(){
	 	$('nav').toggleClass('active');
	 });

});