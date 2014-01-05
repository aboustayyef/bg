	<div id = "footer" class="outer-row dark breath">
		<div class="inner-row">
			<div class ="footer-col-1">
				<div class ="floater">
					<img src="<?php echo WEBPATH.'images/interface/gmaps-icon.gif' ?>" alt="google maps icon">
					<p>Click <a href="">here</a> for a google map to our location in Tema</p>
				</div>
				<hr>
				<p>Call us on: +233 303 300 121</p><p> Our Tema showroom is our only showroom in Ghana.</p>
			</div>
			<div class ="footer-col-2">
				<ul>
					<li>Home</li>
					<li>About</li>
					<li>Projects</li>
					<li>Contact Us</li>
					<li>Locate Us</li>
				</ul>
			</div>
			<div class ="footer-col-3">
				<ul>
					<li>Living Room</li>
					<li>Dining Room</li>
					<li>Bedroom</li>
					<li>Accessories</li>
					<li>Office Furniture</li>
				</ul>
			</div>
			<div class ="footer-col-4">
				<div class ="floater">
					<img src="<?php echo WEBPATH.'images/interface/bg_trademark.png' ?>" alt="Blue Gallery Trademark">
					<p>Blue Gallery™ and the Blue Gallery logo are trademarks of Tarzan Ent. Ltd</p>
				</div>
				<hr>
				<p>Website designed, developed, built and maintained by Mustapha Hamoui in 2012</p>
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

?>

<!-- Stats -->


</body>
</html>