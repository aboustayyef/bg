$(document).ready(function(){

	bgSlides = {
		position: 0,
		count: 4,
		$container: $('.slideshow__slides'),
		
		change: function(){
			var nextPosition = ((this.position) + 1 ) % this.count;
			this.$container.css('background-image', 'url(../img/slides/' + nextPosition + '.jpg)');
			this.position = nextPosition;
		}
	}


	// Change image every five seconds

	window.setInterval(function(){
	  bgSlides.change()
	}, 5000);

});