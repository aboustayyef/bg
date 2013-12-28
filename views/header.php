
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="<?php echo WEBPATH.'style/css/style.css' ?>">
	<title><?php echo $page_title; ?></title>
</head>
<body>
	<div id="tarzan">
		<div class="inner-row">
			A Tarzan Ent. Ltd Company | &copy; 2014 - Ghana
		</div>
	</div>

	<div id ="navbar-l2">
		<ul>
			<li>
				<a href="#">Living Room</a>
				<ul>
					<li><a href="">testilos</a></li>
					<li><a href="">testus</a></li>
					<li><a href="">test3iculos</a></li>
					<li><a href="">hjedculos</a></li>
					<li><a href="">avdtesticulos</a></li>
				</ul>
			</li>
			<li>
				<a href="#">Dining Room</a>
				<ul>
					<li><a href="">2 testilos</a></li>
					<li><a href="">2 testus</a></li>
					<li><a href="">2 test3iculos</a></li>
					<li><a href="">2 hjedculos</a></li>
					<li><a href="">2 avdtesticulos</a></li>
					<li><a href="">2 avdtesticulos</a></li>
				</ul>
			</li>
			<li><a href="#">Bedroom</a></li>
			<li><a href="#">Accessories</a></li>
			<li><a href="#">Office Furniture</a></li>
		</ul>
	</div>

	<div class="paper">

		<div class="outer-row">
			<div id="slogan"><h3>Your destination for premium home and office furniture in Ghana</h3></div>
		</div>

		<div id="header" class="outer-row breath">
			<div class="inner-row">
				<img src="<?php echo WEBPATH.'images/interface/';?>bg_logo_website_468x262.png" width ="234" height ="131" alt="Blue Gallery Logo">
				<!-- Get Navbar -->
				<?php include_once(ABSPATH.'views/navbar.php'); ?>
			</div>
		</div>

<?php 
/* Add definitions to use for later*/
define('BEGINROW', '<div class="outer-row breath"><div class="inner-row"> '); // to begin rows
define('ENDROW', '</div></div>'); // to end rows

?>
