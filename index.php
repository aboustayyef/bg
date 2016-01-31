<?php $path = $_SERVER['DOCUMENT_ROOT'];?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Blue Gallery is Ghana’s top destination for premium home &amp; office furniture">
	<title>Blue Gallery Home &amp; Office - Contemporary furniture in Ghana</title>
	<link href='https://fonts.googleapis.com/css?family=Lato:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/app.css?v=1.01">
</head>
<body>
	<div class="page__shroud"></div>	
	<header id="header">
		<?php include_once($path . '/partials/header.php'); ?>	
	</header>

	<div id="fullpage">   
	    <div id="home" class="section bgSection bgSection--notop">
			<?php include_once($path . '/partials/slides.php'); ?>
		</div>
		<div id="features" class="section bgSection">
			<?php include_once($path . '/partials/features.php') ?>
		</div>
		<div id="customers" class="section bgSection">
			<?php include_once($path . '/partials/customers.php') ?>
		</div>    
	    <div id="lb_collection" class="section bgSection">
		    <?php include_once($path . '/partials/collection.php'); ?>
	    </div>
	    
	    <div id ="brands" class="section bgSection">
	    	<?php include_once($path . '/partials/brands.php'); ?>
	    </div>
	    
	    <div id="projects" class="section bgSection">
	    	<?php include_once($path . '/partials/projects.php'); ?>
	    </div>

	    <div id="contact" class="section bgSection">
	    	<?php include_once($path . '/partials/contacts.php'); ?>
	    </div>
	</div>
	<div id="modalpage">
			<div id="closewindow">
				<div class="layout__inner">
					<a href="#" class="light off-modal">&times; close</a>
				</div>
			</div>
			<?php include($path . '/partials/contacts.php'); ?>			
	</div>
	<script src="js/min/app-min.js"></script>
</body>
</html>