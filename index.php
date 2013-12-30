<?php 
require_once('init.php');
$page_title = 'Blue Gallery Home &amp; Office - Contemporary furniture in Ghana';
include_once(ABSPATH.'views/header.php');

?>

		<div class="outer-row">
			<div id="slideshow">
				<div class="slide" style="z-index:3"><a href=""><img src="<?php echo WEBPATH.'images/slideshow/';?>824x347-elegance-simplicity-aran.jpg" width ="824" height="347" alt="blue gallery slide"></a></div>
				<div class="slide"><a href=""><img src="<?php echo WEBPATH.'images/slideshow/';?>824x347-enhance-your-home-scomfort.jpg" width ="824" height="347" alt="blue gallery slide"></a></div>
				<div class="slide"><a href=""><img src="<?php echo WEBPATH.'images/slideshow/';?>824x347-glass-coming-back-2-life-kostaboda.jpg" width ="824" height="347" alt="blue gallery slide"></a></div>
				<div class="slide"><a href=""><img src="<?php echo WEBPATH.'images/slideshow/';?>824x347-interstuhl-seating-knowledge.jpg" width ="824" height="347" alt="blue gallery slide"></a></div>
			</div>
			<div id="feat1">
				<img src="<?php echo WEBPATH.'images/slideshow/';?>173x173-the-airpad.jpg" alt="feature 1">
			</div>
			<div id="feat2">
				<img src="<?php echo WEBPATH.'images/slideshow/';?>173x173-potomanto.jpg" alt="feature 1">
			</div>
		</div>

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
					<div class="new-items-feature"><img src="http://placehold.it/230x142" alt=""></div>
				</div>
				<div class="fourth">
					<div class="new-items-feature"><img src="http://placehold.it/230x142" alt=""></div>
				</div>
				<div class="fourth">
					<div class="new-items-feature"><img src="http://placehold.it/230x142" alt=""></div>
				</div>
				<div class="fourth last">
					<div class="new-items-feature"><img src="http://placehold.it/230x142" alt=""></div>
				</div>
			</div>
		</div>

		

<?php require_once(ABSPATH.'views/footer.php'); ?>