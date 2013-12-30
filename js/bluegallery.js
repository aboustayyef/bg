
BG_APP = {
	menu : {
		bg_menu: $('#navbar-l2'), // the entire zone of the menu
		trigger: $('#navbar ul li').eq(2), //the collection menu item
		mouse_in_menu: 'no',
		fixLocation: function(){
			/* Position Menu Vertically */
			$('#navbar-l2').css('top', $('#header').position().top+$('#navbar').position().top +7 );
			
			/* Position Menu Horizontally*/
			var x = ($(window).width() - $('.paper').width())/2;
			if (x<0) {x=1;}
			var x2 = 20; //left padding
			$('#navbar-l2').css('left', $('#navbar ul').position().left+$('#navbar ul li').eq(2).position().left+x+x2+9);
		},
		show: function(){
			this.bg_menu.css('display','block');
		},
		hide: function(){
			this.bg_menu.css('display','none');
		},
		init: function(){
			this.fixLocation();
			// when mouse gets into the trigger item, show the menu
			this.trigger.on('mouseenter', function(){
				BG_APP.menu.trigger.addClass('active');
				BG_APP.menu.show();
			});

			// when mouse leaves the menu zone, hide the menu
			this.bg_menu.on('mouseleave', function(){
				BG_APP.menu.trigger.removeClass('active');
				BG_APP.menu.hide();
			});

			$('#navbar-l2 ul li').on('mouseenter', function(){
				$(this).addClass('active');
				$(this).find('ul').addClass('active');
			});
			$('#navbar-l2 ul li').on('mouseleave', function(){
				$(this).removeClass('active');
				$(this).find('ul').removeClass('active');
			});
			
			/* Hack to turn off menu if mouse exits from the top menu item to left or right*/
			$('#navbar ul li').eq(1).on('mouseenter', function(){
				BG_APP.menu.trigger.removeClass('active');
				BG_APP.menu.hide();
			});
			$('#navbar ul li').eq(3).on('mouseenter', function(){
				BG_APP.menu.trigger.removeClass('active');
				BG_APP.menu.hide();
			});
		}
	},
	slideshow:{
		currentSlideIndex:0,
		nextSlideIndex:1,
		goNext: function(){
			// next slide gets z-index of 2 (becomes right under current slide)
			$('.slide').eq(this.nextSlideIndex).css('z-index',2);

			// fade current slide to opacity 0 so that next slide becomes visible
			$('.slide').eq(this.currentSlideIndex).animate({'opacity': 0},900, function(){
				//animation complete
				// give current slide z-index of 0 (put it back in the stack)
				$('.slide').eq(BG_APP.slideshow.currentSlideIndex).css('z-index',0);

				// give current slide opacity of 1 (it's ok, now it's behind the others)
				$('.slide').eq(BG_APP.slideshow.currentSlideIndex).fadeTo('fast',1);
				
				// next slide gets z-index of 3 
				$('.slide').eq(BG_APP.slideshow.nextSlideIndex).css('z-index',3);
				//bump up the indexes
				BG_APP.slideshow.currentSlideIndex = (BG_APP.slideshow.currentSlideIndex +1) % $('.slide').length;
				BG_APP.slideshow.nextSlideIndex = (BG_APP.slideshow.nextSlideIndex +1) % $('.slide').length;

			});
			
		},
		init: function(){
			this.goNext();
			var repeat = setTimeout(function(){
				BG_APP.slideshow.init();
			}, 7000);
		}
	}
};

$(document).ready(function(){
	BG_APP.menu.init();
});

$(window).load(function(){
	BG_APP.slideshow.init();
})

var do_resize;
$(window).resize(function() {
	clearTimeout(do_resize);
	do_resize=setTimeout(function(){
		BG_APP.menu.fixLocation();
	},300);
});