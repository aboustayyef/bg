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
		<h1 class="header__logo" title="Welcome To Blue Gallery"></h1>	
	</header>

	<div id="fullpage">
	    <div id="home" class="section fp-auto-height">
			<?php include_once($path . '/partials/slides.php'); ?>
	    </div>
		
		<div id="features" class="section fp-auto-height">
			<?php include_once($path . '/partials/features.php') ?>
		</div>
		
	    <div id ="brands" class="section" style="background-color:#ededed">

	    </div>
	    <div class="section">Some section</div>
	    <div class="section">Some section</div>
	</div>
	<script src="js/min/app-min.js"></script>
</body>
</html>