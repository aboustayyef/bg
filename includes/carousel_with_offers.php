<!-- Place somewhere in the <body> of your page -->

<div class ="span-20">
	<div class="flexslider">
	  <ul class="slides">
	    <li>
	      <img src="posters/950x400-elegance-simplicity-aran.jpg" />
	    </li>
	    <li>
	      <img src="posters/950x400-interstuhl-seating-knowledge.jpg" />
	    </li>
		  <li>
	      <img src="posters/950x400-playing-with-light-metalspot.jpg" />
	    </li>
		  <li>
	      <img src="posters/950x400-enhance-your-home-scomfort.jpg" />
	    </li>
		  <li>
	      <img src="posters/950x400-glass-coming-back-to-life-kostaboda.jpg" />
	    </li>
	  </ul>
	</div> <!-- /flexslider -->
 <!-- FlexSlider (requires jQuery 1.7.x ) -->
  <script defer src="FlexSlider/js/jquery.flexslider.js"></script>
  
  <script type="text/javascript">
  
    $(document).ready(function(){
      $('.flexslider').flexslider({
        animation: "fade",
        slideshowspeed: 10000,
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>


</div> <!-- /span-20 -->
<div id ="offers" class="span-4 last"> 
	<img src="http://placehold.it/140x140">
	<img src="http://placehold.it/140x140">
</div>