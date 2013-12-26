<?php session_start(); $thispage ="Search Results" ; ?>

<?php include("includes/site_header.php") ; ?> <!-- === Logo, contacts and searchbox === -->
<?php include("includes/site_navigation.php");?> <!-- === the site's navigation === -->

<div class="span-24">
	<hr>
	<hr class="space"><hr class="space">
	<?php
	 	echo "<h3>Sorry, the search page is still under construction</h3>";
 		echo "<p>You searched for: <i>".$_GET["searchterm"]."</i></p>";
 	 ?>
</div>

<?php include("includes/site_footer.php"); ?>
