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
		<?php include_once($path . '/partials/header.php'); ?>	
	</header>

	<div id="fullpage">
	    
	    <div id="home" class="section bgSection bgSection--notop">
			<?php include_once($path . '/partials/slides.php'); ?>
			<?php include_once($path . '/partials/features.php') ?>
		</div>
	    
	    <div id="lb_collection" class="section bgSection">
		    <?php include_once($path . '/partials/collection.php'); ?>
	    </div>
	    
	    <div id ="brands" class="section bgSection">
	    	<?php include_once($path . '/partials/brands.php'); ?>
	    </div>
	    
	    <div id="projects" class="section bgSection">
	    	<h3>Projects</h3>
	    </div>

	    <div id="contact" class="section bgSection">
	    	<h3>Contact Us</h3>
	    </div>

	</div>
	<script src="js/min/app-min.js"></script>
</body>
</html>