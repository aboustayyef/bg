<?php 
require_once('init.php');
$page_title = 'Blue Gallery Home &amp; Office - Contemporary furniture in Ghana';
include_once(ABSPATH.'views/header.php');

?>

		<!-- Slideshow -->
		<div class="outer-row">
			<div id="slideshow">
				<div class="slide" style="z-index:3"><a href=""><img src="<?php echo WEBPATH.'images/slideshow/';?>824x347-elegance-simplicity-aran.jpg" width ="824" height="347" alt="blue gallery slide"></a></div>
				<div class="slide"><a href=""><img src="<?php echo WEBPATH.'images/slideshow/';?>824x347-enhance-your-home-scomfort.jpg" width ="824" height="347" alt="blue gallery slide"></a></div>
				<div class="slide"><a href=""><img src="<?php echo WEBPATH.'images/slideshow/';?>824x347-glass-coming-back-2-life-kostaboda.jpg" width ="824" height="347" alt="blue gallery slide"></a></div>
				<div class="slide"><a href=""><img src="<?php echo WEBPATH.'images/slideshow/';?>824x347-interstuhl-seating-knowledge.jpg" width ="824" height="347" alt="blue gallery slide"></a></div>
			</div>
			<div id="feat1">
				<a href="<?php echo WEBPATH.'collection/?prod=513' ?>"><img src="<?php echo WEBPATH.'images/slideshow/';?>173x173-the-airpad.jpg" alt="feature 1"></a>
			</div>
			<div id="feat2">
				<a href="<?php echo WEBPATH.'special/potomanto.php' ?>"><img src="<?php echo WEBPATH.'images/slideshow/';?>173x173-potomanto.jpg" alt="feature 1"></a>
			</div>
		</div>

		<!-- Explore Our Collection -->
		<div class="outer-row breath">
			<div class="inner-row">
				<h2>
					<span>Explore our collection</span>
					<small class ="stress">Browse our entire stock from the comfort of your home</small>
				</h2>
			</div>
		</div>

		<div class="outer-row">
			<div class="inner-row">
				<div class="fifth">
					<div class="collection-feature">
						<a href="<?php echo Render::make_link('category',105); ?>"><div class="intermodal">Office Furniture</div></a>
						<img src="<?php echo WEBPATH.'images/posters/175x175-office.jpg' ?>" alt="">
					</div>
				</div>
				<div class="fifth">
					<div class="collection-feature">
						<a href="<?php echo Render::make_link('category',104); ?>"><div class="intermodal">Accessories</div></a>
						<img src="<?php echo WEBPATH.'images/posters/175x175-accessories.jpg' ?>" alt="">
					</div>
				</div>
				<div class="fifth">
					<div class="collection-feature">
						<a href="<?php echo Render::make_link('category',101); ?>"><div class="intermodal">Living Room</div></a>
						<img src="<?php echo WEBPATH.'images/posters/175x175-living.jpg' ?>" alt="">
					</div>
				</div>
				<div class="fifth">
					<div class="collection-feature">
						<a href="<?php echo Render::make_link('category',102); ?>"><div class="intermodal">Dining Room</div></a>
						<img src="<?php echo WEBPATH.'images/posters/175x175-dining.jpg' ?>" alt="">
					</div>
				</div>
				<div class="fifth last">
					<div class="collection-feature">
						<a href="<?php echo Render::make_link('category',103); ?>"><div class="intermodal">Bedroom</div></a>
						<img src="<?php echo WEBPATH.'images/posters/175x175-beds.jpg' ?>" alt="">
					</div>
				</div>
			</div>
		</div>

		<!-- New Items -->
		<div class="outer-row breath">
			<div class="inner-row">
				<h2>
					<span>New Items</span>
					<small class ="stress">Latest arrivals, special offers and announcements</small>
				</h2>
			</div>
		</div>

		<div class="outer-row">
			<div class="inner-row">
				<div class="fourth">
					<a href=""><div class="new-items-feature"><img src="<?php echo WEBPATH.'images/posters/230x142_artificial_flowers.jpg' ?>" alt="Artificial Flowers"></a></div>
				</div>
				<div class="fourth">
					<a href=""><div class="new-items-feature"><img src="<?php echo WEBPATH.'images/posters/230x142_carpets.jpg' ?>" alt="Carpets and Rugs"></a></div>
				</div>
				<div class="fourth">
					<a href=""><div class="new-items-feature"><img src="<?php echo WEBPATH.'images/posters/230x142_our_showroom.jpg' ?>" alt="Find our showroom"></a></div>
				</div>
				<div class="fourth last">
					<!-- Nothing -->
				</div>
			</div>
		</div>


		<!-- Our Brands -->

		<div class="outer-row breath">
			<div class="inner-row">
				<h2>
					<span>Our Brands</span>
					<small class ="stress">Finest products from all around the world</small>
				</h2>
			</div>
		</div>

		<div class="outer-row">
			<div id ="brand-logos" class="inner-row">
				<div class="hstack"><img src ="<?php echo WEBPATH.'images/brand-logos/Orrefors.gif' ?>"></div>
				<div class="hstack"><img src ="<?php echo WEBPATH.'images/brand-logos/aran_newform.png' ?>"></div>
				<div class="hstack"><img src ="<?php echo WEBPATH.'images/brand-logos/interstuhl.png' ?>"></div>
				<div class="hstack"><img src ="<?php echo WEBPATH.'images/brand-logos/sia-home-fashion.gif' ?>"></div>
				<div class="hstack"><img src ="<?php echo WEBPATH.'images/brand-logos/ligne_pure.gif' ?>"></div>
				<div class="hstack last"></div>
			</div>
		</div>


<?php require_once(ABSPATH.'views/footer.php'); ?>