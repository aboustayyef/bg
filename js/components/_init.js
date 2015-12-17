$(document).ready(function(){
	$('#fullpage').fullpage(
	{
		anchors:['home', 'collection', 'brands', 'projects', 'contact'],
		menu:'#lbmenu',
		controlArrows:true,
		keyboardScrolling: true,
		fitToSection:true,
		autoScrolling:false,
	}
	);
});