<?php $path = $_SERVER['DOCUMENT_ROOT'];?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Test</title>
	<link rel="stylesheet" type="text/css" href="css/app.css">
</head>
<body>
	
	<header id="header">
		<div class="header__wrapper">
			<div class="header__inner">
				<h1 class="header__logo" title="Welcome To Blue Gallery"></h1>
			</div>
		</div>	
	</header>

	<div id="fullpage">
	    <div id="home" class="section fp-auto-height">
			<?php include_once($path . '/partials/slides.php'); ?>
			<?php include_once($path . '/partials/features.php') ?>
		</div>
		
	    <div id ="brands" class="section" style="background-color:#ededed">
			<p>Brands; Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem labore ad voluptatum iste perspiciatis adipisci, maxime, necessitatibus sit. Doloribus nisi quia deserunt nobis, sunt repellendus incidunt facilis, asperiores. Saepe, ab pariatur! Consectetur ratione id natus omnis alias et animi numquam? Iure earum, consectetur molestias eveniet voluptate alias, ex hic eos!</p>
	    </div>
	    <div class="section">Some section</div>
	    <div class="section">Some section</div>
	</div>
	<script src="js/min/app-min.js"></script>
</body>
</html>