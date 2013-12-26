<?php session_start(); $thispage ="home" ; ?>

<?php include("includes/site_header.php") ; ?> <!-- === Logo, contacts and searchbox === -->
<?php include("includes/site_navigation.php");?> <!-- === the site's navigation === -->

<?php include("includes/carousel.php") ;?>

<!--  <?php bg_url(101) ; ?>   -->

<h2 class ="page_section" style = "clear:both">Explore our collection <small> Browse our entire stock from the comfort of your home</small></h2>
<hr class = "space">

<div id ="browse-collection" class ="span-24">
	<ul class ="thumbnails">
		<a href ="<?php echo BASE_URL ; ?>/browse.php?room=105">
			<li class ="square_box_homepage office">
				<img src ="design_images/new_red.png" class ="new_overlay">
				<h3>Offices</h3>
			</li>
		</a>
		<a href ="browse.php?room=104">
			<li class ="square_box_homepage accessories">
				<img src ="design_images/new_red.png" class ="new_overlay">
				<h3>Accessories</h3>
			</li>
		</a>
		<a href ="browse.php?room=101">
			<li class ="square_box_homepage living">
				<h3>Living Rooms</h3>
			</li>
		</a>
		<a href ="browse.php?room=102">
			<li class ="square_box_homepage dining">
				<h3>Dining Rooms</h3>
			</li>
		</a>
		<a href ="browse.php?room=103">
			<li class ="square_box_homepage last beds">
				<h3>Bedrooms</h3>
			</li>
		</a>

	</ul>
</div>

<hr class = "space">
<h2 class ="page_section">New items <small>Latest arrivals, special offers and announcements</small></h2>
<hr class = "space">

<div id ="main-page-ad1" class ="span-6"><a href="browse.php?room=104&amp;category=254"><img src ="posters/230x142_artificial_flowers.jpg"></a></div>
<div id ="main-page-ad2" class ="span-6"><a href="browse.php?room=104&amp;category=253"><img src ="posters/230x142_carpets.jpg"></a></div>
<div id ="main-page-ad3" class ="span-6"><a href="<?php echo BASE_URL ; ?>/browse.php?room=104&amp;category=255&amp;special=lights"><img src ="posters/230x142_lights.jpg"></a></div>
<div id ="main-page-ad4" class ="span-6 last"><a href="<?php echo BASE_URL ; ?>/where.php"><img src ="posters/230x142_our_showroom.jpg"></a></div>

<hr class = "space">
<h2 class="page_section">Our Brands <small>Finest products from all around the world</small></h2>
<hr class = "space">

<ul class ="list_of_brands">
	<li><img src="design_images/brand_logos/Orrefors.gif"></li>
	<li><img src="design_images/brand_logos/aran_newform.png"></li>
	<li><img src="design_images/brand_logos/index.png"></li>
	<li><img src="design_images/brand_logos/ligne_pure.gif"></li>
	<li><img src="design_images/brand_logos/sia-home-fashion.gif"></li>
	<li><img src="design_images/brand_logos/metalspot.png"></li>
</ul>
	<?php include("includes/site_footer.php");?> <!-- ==== the footer is outside blueprint.css hence outside the container class=== -->
</div>
</body>
</html>
