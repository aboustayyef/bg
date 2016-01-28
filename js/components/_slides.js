$(document).ready(function(){
	var allSlides = [
		"../img/slides/reference_silver_088.jpg",
		"../img/slides/amos_2013_001.jpg",
		"../img/slides/sanders_003.jpg",
		"../img/slides/kanaha_003.jpg",
		"../img/slides/morrison_00.jpg",
		"../img/slides/tower_evo_44_45.jpg",
		"../img/slides/interstuhl_ambient_yellow.jpg",
		"../img/slides/vista_74_75.jpg",
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