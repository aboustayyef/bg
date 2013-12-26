<!-- Initiate menu -->
	<script type="text/javascript">
	$(document).ready(function($){
		$('#mega-menu-1').fadeTo('fast', 1, function(){});
		$('#mega-menu-1').dcMegaMenu({
			rowItems: '3',
			speed: 'fast',
			effect: 'fade',
			event: 'hover',
			fullWidth: false
		});
	});
	</script>
<div id ="nav" class ="span-15 last">
	<div class="slogan">
		Your destination for premium home and office furniture in Ghana
	</div>
<ul id="mega-menu-1" class="mega-menu">
	<li <?php isactive("home") ?>><a href="<?php echo BASE_URL ; ?>">Home</a></li>
	<li <?php isactive("about") ?>><a href="about.php">About</a></li>
	<li <?php isactive("collection") ?>><a href="#">Collections &blacktriangledown;</a>
		<ul>
			<li><a href="<?php echo BASE_URL ; ?>/browse.php?room=101">Living Room</a>
				<ul>
					<li><a href="<?php echo BASE_URL ; ?>/browse.php?room=101&amp;category=201">Sofa Sets</a></li>
					<li><a href="<?php echo BASE_URL ; ?>/browse.php?room=101&amp;category=202">Corners &amp; Sectionals</a></li>
					<li><a href="<?php echo BASE_URL ; ?>/browse.php?room=101&amp;category=203">Tables &amp; Shelves</a></li>
					<li><a href="<?php echo BASE_URL ; ?>/browse.php?room=101&amp;category=204">Armchairs</a></li>
				</ul>
			</li>
			<li><a href="<?php echo BASE_URL ; ?>/browse.php?room=102">Dining Room</a>
			    <ul>
					<li><a href="<?php echo BASE_URL ; ?>/browse.php?room=102&amp;category=211">Dining Tables</a></li>
					<li><a href="<?php echo BASE_URL ; ?>/browse.php?room=102&amp;category=212">Dining Chairs</a></li>
					<li><a href="<?php echo BASE_URL ; ?>/browse.php?room=102&amp;category=213">Showcases</a></li>
					<li><a href="<?php echo BASE_URL ; ?>/browse.php?room=102&amp;category=214">Sideboards</a></li>
				</ul>
			</li>
			<li><a href="<?php echo BASE_URL ; ?>/browse.php?room=103">Bedroom</a>
			    <ul>
					<li><a href="<?php echo BASE_URL ; ?>/browse.php?room=103&amp;category=221">Beds</a></li>
					<li><a href="<?php echo BASE_URL ; ?>/browse.php?room=103&amp;category=222">Nightstands</a></li>
					<li><a href="<?php echo BASE_URL ; ?>/browse.php?room=103&amp;category=223">Chest of Drawers</a></li>
					<li><a href="<?php echo BASE_URL ; ?>/browse.php?room=103&amp;category=224">Wardrobes</a></li>
					<li><a href="<?php echo BASE_URL ; ?>/browse.php?room=103&amp;category=225">Mattresses &amp; Box Beds</a></li>
				</ul>
			</li>
			<li><a href="<?php echo BASE_URL ; ?>/browse.php?room=104">Accessories</a>
			    <ul>
					<li><a href="<?php echo BASE_URL ; ?>/browse.php?room=104&amp;category=250">Bowls, Vases &amp; Dishes</a></li>
					<li><a href="<?php echo BASE_URL ; ?>/browse.php?room=104&amp;category=251">Home Bar &amp; Shelf Objects</a></li>
					<li><a href="<?php echo BASE_URL ; ?>/browse.php?room=104&amp;category=252">Aromatics &amp; Candle Holders</a></li>
					<li><a href="<?php echo BASE_URL ; ?>/browse.php?room=104&amp;category=253">Carpets &amp; Rugs</a></li>
					<li><a href="<?php echo BASE_URL ; ?>/browse.php?room=104&amp;category=254">Artificial Flowers</a></li>
					<li><a href="<?php echo BASE_URL ; ?>/browse.php?room=104&amp;category=255&amp;special=lights">Lights</a></li>
				</ul>
			</li>
			<li><a href="<?php echo BASE_URL ; ?>/browse.php?room=105">Office Furniture</a>
			  <ul>
				<li><a href="<?php echo BASE_URL ; ?>/browse.php?room=105&amp;category=301">Chairs</a></li>
					<li><a href="<?php echo BASE_URL ; ?>/browse.php?room=105&amp;category=301&amp;special=workstations">Workstations</a></li>
			  </ul>
			</li>
		</ul>
	</li>
<li <?php isactive("projects"); ?>><a href="projects.php">Projects</a></li>
<li <?php isactive("contact"); ?>><a href="contact.php">Contact us</a></li>
<li <?php isactive("where"); ?>><a href="where.php">Locate us</a></li>

</ul>
	</div>
		</div>
</div> <!-- /bg_header -->