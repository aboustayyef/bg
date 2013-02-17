<?php session_start(); $thispage ="where" ; ?>

<?php include("includes/site_header.php") ; ?> <!-- === Logo, contacts and searchbox === -->
<?php include("includes/site_navigation.php");?> <!-- === the site's navigation === -->

<hr>
	<h2>Our Location</h2>
<hr>
<div id ="map" class="span-24">
	<div style ="border:1px Solid Silver">
		<iframe width="948" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps/ms?msid=214298567427427531482.0004d327b357282de0ad0&amp;msa=0&amp;ie=UTF8&amp;t=m&amp;ll=5.685683,-0.017853&amp;spn=0.014946,0.04077&amp;z=15&amp;output=embed"></iframe>	
	</div>
</div>
<hr class="space">
<h2>Address:</h2>

<address>
	Aflao Road, near Tema Roundabout, Opposite Shell station <br><strong>Tel: </strong>+233 303 300 121 
</address>


<?php include("includes/site_footer.php"); ?>