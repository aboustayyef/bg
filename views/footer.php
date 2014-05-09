	<div id = "footer" class="outer-row dark breath">
		<div class="inner-row">
			<div class ="footer-col-1">
				<div class ="floater">
					<img src="<?php echo WEBPATH.'images/interface/gmaps-icon.gif' ?>" alt="google maps icon">
					<p>Click <a href="<?php echo WEBPATH.'map.php' ?>">here</a> for a google map to our location in Tema</p>
				</div>
				<p><i class="fa fa-phone"></i> Call us on: +233 303 300 121</p><p class="warning"><i class="fa fa-warning"></i> Our Tema showroom is our only showroom in Ghana.</p>
			</div>
			<div class ="footer-col-2">
				<ul>
					<li><a href="<?php echo WEBPATH.'.' ?>">Home</a></li>
					<li><a href="<?php echo WEBPATH.'about.php' ?>">About</a></li>
					<li><a href="<?php echo WEBPATH.'projects.php' ?>">Projects</a></li>
					<li><a href="<?php echo WEBPATH.'contact.php' ?>">Contact Us</a></li>
					<li><a href="<?php echo WEBPATH.'map.php' ?>">Locate Us</a></li>
				</ul>
			</div>
			<div class ="footer-col-3">
				<ul>
					<li><a href="<?php echo WEBPATH.'/collection/?cat=101' ?>">Living Room</a></li>
					<li><a href="<?php echo WEBPATH.'/collection/?cat=102' ?>">Dining Room</a></li>
					<li><a href="<?php echo WEBPATH.'/collection/?cat=103' ?>">Bedroom</a></li>
					<li><a href="<?php echo WEBPATH.'/collection/?cat=104' ?>">Accessories</a></li>
					<li><a href="<?php echo WEBPATH.'/collection/?cat=105' ?>">Office Furniture</a></li>
				</ul>
			</div>
			<div class ="footer-col-4">
				<div class ="floater">
					<img src="<?php echo WEBPATH.'images/interface/bg_trademark.png' ?>" alt="Blue Gallery Trademark">
					<p>Blue Gallery™ and the Blue Gallery logo are trademarks of Tarzan Ent. Ltd</p>
				</div>
				<hr>
				<p>Website designed, developed, built and maintained by Mustapha Hamoui</p>
				<p><a href="">Admin Login</a></p>
			</div>
		</div>
	

	</div>



</div> <!-- //paper -->

<!-- Dependencies -->
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo WEBPATH.'js/bluegallery.js' ?>"></script>

<?php 
if (isset($product)) { //we're in the products page
	?>
		<script type="text/javascript" src="<?php echo WEBPATH.'js/products.js' ?>"></script>
	<?php
}
if ($page = 'contact') { // we're in the contact us page
	?>
		<script type="text/javascript" src="<?php echo WEBPATH.'js/contact.js' ?>"></script>
	<?php
}
?>

<!-- Analytics -->
<script type="text/javascript">
	
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-15958815-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<!-- Statcounter -->
<script type="text/javascript">
var sc_project=3755389; 
var sc_invisible=1; 
var sc_security="0198baa1"; 
</script>
<script type="text/javascript"
src="http://www.statcounter.com/counter/counter.js"></script>
<!-- End of StatCounter Code -->


</body>
</html>