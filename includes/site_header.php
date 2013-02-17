<?php 
// Set the parameters and initialize. Required in all pages 
require_once('config.php');
require_once('functions.php') ;	
?> 

<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8" />
		<title>
			<?php bg_dbconnect() ;
			 $room = $_GET["room"]; 
			 $category = $_GET["category"];	
			 $product = $_GET["product"]; 
			 $title = display_title($room, $category, $product);
			 echo $title;			 
			 $special = $_GET["special"];
			 ?>
		</title>
		
		<!--google-->
		<meta name ="description" content ="Blue Gallery is a one stop shop for premium Home and Office furniture in Ghana.">

		<!-- facebook -->
		<meta property="fb:admins" content="812400331" />
		<meta property="og:image" content="http://bluegallery.com.gh/design_images/bg_logo_website_468x262.png"/>
		<meta property="og:title" content="Blue Gallery Home &amp; Office" />
		<meta property="og:url" content="http://bluegallery.com.gh/" />
		<meta property="og:type" content="website" />
		<meta property="og:description" content="Blue Gallery is a one stop shop for premium Home and Office furniture in Ghana." />
		<link rel= "shortcut icon" href= "favicon.ico" type="image/x-icon" />
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<?php load_stylesheet() ;?>
	</head>
<body class ="darkgrey">

	<!-- All general javascript environment requests are made here -->
 	
 	<!-- when offline use the local jQuery below -->
 	<!-- <script type="text/javascript" src='<?php echo BASE_URL ; ?>/js/jquery.js'></script> -->

 	<div id="fb-root"></div> <!-- facebook -->
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=238902406162657";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>

		<!-- jquery -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 
		<!-- Hover Intent -->
		<script type='text/javascript' src='<?php echo BASE_URL ; ?>/js/jquery.hoverIntent.minified.js'></script>
		<!-- DC Mega Menu -->
		<script type='text/javascript' src='<?php echo BASE_URL ; ?>/js/jquery.dcmegamenu.1.3.3.min.js'></script>

	<div id="topbar">
		
		<?php  if ($_SESSION["loggedin"] == "bgmanagement") { ;?>
				
			<div id="loggedin">
				You are logged in as management. <a href="logout.php">Click here</a> to log out.
			</div>
				
		<?php  } ?>

		<div id ="bar_container">
			<div id="tarzan">A <a href="http://tarzan.com.gh">Tarzan Ent. Ltd</a> Company | &copy; 2013 - Ghana</div>
			<ul>
				<li><div class="fb-like" data-href="https://www.facebook.com/blue.gallery.ghana" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false" data-font="lucida grande" data-colorscheme="dark"></div></li>
				<li class ="social facebook"><a href ="https://www.facebook.com/blue.gallery.ghana"><img src ="design_images/transparent.gif" width = "25px" height = "25px"></a></li>
				<li class = "social twitter"><a href="http://twitter.com/blue_gallery"><img src ="design_images/transparent.gif" width = "25px" height = "25px"></a></li>
				<li class = "social pinterest"><a href="#"><img src ="design_images/transparent.gif" width = "25px" height = "25px"></a></li>
				<li> 
					<form id ="search_form" action = "search.php" method ="get">
						<input type = "text" name ="searchterm"></input>
						<input type = "submit" value ="Go"></input>
					</form>
				</li>
			</ul>
		</div>
	</div>
	
	<div id = "mainpage">
		<div class ="container "> <!-- Blueprint 24 column main wrapper -->
		<div id ="bg_header"> 
			<div id = "logo_nav" class ="span-24">
				<div id = "logo" class ="span-9">
					<a href ="<?php echo BASE_URL ; ?>"><img src ="design_images/bg_logo_website_468x262.png" width ="234" height ="131" alt ="Blue Gallery Logo"></a>
				</div>
				<?php 
					if ($thispage !== "valentine") {
						;?>
						
						<a href="./valentine"><img src ="posters/gift_ideas_teaser.png" class="teaser"></img></a>
						
						<?php
					}
				 ?>
				


