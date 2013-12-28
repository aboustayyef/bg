
BG_APP = {
	menu : {
		bg_menu: $('#navbar-l2'), // the entire zone of the menu
		trigger: $('#navbar ul li').eq(2), //the collection menu item
		mouse_in_menu: 'no',
		fixLocation: function(){
			/* Position Menu Vertically */
			$('#navbar-l2').css('top', $('#header').position().top+$('#navbar').position().top +12 );
			
			/* Position Menu Horizontally*/
			var x = ($(window).width() - $('.paper').width())/2;
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
};

$(document).ready(function(){
	BG_APP.menu.init();
});