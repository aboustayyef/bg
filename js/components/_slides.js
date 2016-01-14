$(document).ready(function(){
	var allSlides = [
		"../img/slides/eidos_evo_42_43.jpg",
		"../img/slides/tower_evo_22_23.jpg",
		"../img/slides/vista_74_75.jpg"
	];

	// Slideshow at top
	$(".slideshow__slides").backstretch(
		allSlides, {
	  	duration: 4000,
	  	fade: 950
	  });

	// Projects Section
	$('#projects').backstretch('../img/projects_background.jpg');

});