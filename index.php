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
	<!-- Google Analytics -->
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-15958815-1', 'auto');
	  ga('send', 'pageview');

	</script>

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
	
	<!-- Custom App -->
	<script src="js/min/app-min.js"></script>





</body>
</html>