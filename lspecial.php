<?php session_start(); $thispage ="collection" ;?>


<?php include("includes/site_header.php") ; ?> <!-- === Logo, contacts and searchbox === -->
<?php include("includes/site_navigation.php");?> <!-- === the site's navigation === -->

<div id ="main_content_wrapper" style = "clear:both">
	<div id = "bg_breadcrumbs" class ="span-24">
		<?php bg_dbconnect() ; ?>
		<?php display_breadcrumbs ($room, $category, $product, $special); ?>
	</div> <!-- Breadcrumbs end -->	

	<?php $headline = display_headline($room, $category, $product) ;?>
	<h2 class ="page_header"> <?php echo $headline ; ?> </h2>

<?php include("specials/$special".".php") ?>

</div><!-- main_content wrapper -->
<?php include("includes/site_footer.php");?> <!-- ==== the footer is outside blueprint.css hence outside the container class=== -->
</div> <!-- Main page (page that surrounds the entire blue grid css page) -->
</body>
</html>
