<?php session_start(); $thispage ="collection" ;?>
<!-- page: l2.php -->

<?php include("includes/site_header.php") ; ?> <!-- === Logo, contacts and searchbox === -->
<?php include("includes/site_navigation.php");?> <!-- === the site's navigation === -->
	
	<div id ="main_content_wrapper" style = "clear:both">
		<div id = "bg_breadcrumbs">
			<?php // ==== breadcrumbs  ====		
			bg_dbconnect() ; $room= $_GET["room"];	display_breadcrumbs ($room,NULL,NULL);?>
		</div> <!-- /bg_breadcrumbs -->
		<div id ="main_content" class ="span-24">
			<h2 class ="page_header">	<?php echo room_name($room);?> </h2>
			<div id ="room-poster">
				<?php 
					$query = "SELECT * FROM Rooms WHERE room_id = $room";
					$result = mysql_query($query);
					$row = mysql_fetch_array($result);
				 ?>
				<img src ="<?php echo"posters/". $row['room_poster']; ?>">
			</div>
			<?php 
				bg_dbconnect() ;
				$room = $_GET["room"];
				$query = 'SELECT * FROM `Categories` WHERE `cat_parent_id` ='.$room;
				$result = mysql_query($query);
				$num = mysql_numrows($result);
				
				$i =0;
				echo "<div class =\"list-of-categories\">";
				while ($i < $num) {
					$cat_id =mysql_result($result, $i, "cat_id");
					$cat_name =mysql_result($result, $i, "cat_name");
					$cat_description =mysql_result($result, $i, "cat_description");
					$cat_special = mysql_result($result, $i, "cat_special");
					if (strlen($cat_special)<2) { //If not a special category, get a random thumbnail pic
						$random_set = get_random_set_item($room, $cat_id); //sofa set is 201
						$random_set_image_url = $random_set[1]; // outputs: images/000000_thumb.jpg
						$cat_url = "browse.php?room=$room&category=$cat_id" ;
					} else { // if category is special , use the cat_poster field for thumbnail.
						$cat_url = "browse.php?room=$room&category=$cat_id&special=$cat_special";
						$random_set_image_url = BASE_URL ."/posters/".mysql_result($result,$i, "cat_poster");
					}
					
			?>
			<a href ="<?php echo $cat_url ;?>">
			<div class ="category-box">
				<img src ="<?php echo $random_set_image_url ;?>">
				<div class = "details-box">
					<h3><?php echo $cat_name ;?></h3>
					<p class ="category-description"><?php echo $cat_description ;?></p>
				</div>
				</a>
			</div>
			
			<?php $i++;	} ?>
		</div> <!-- /main_content -->
	</div> <!-- /main_content_wrapper -->
</div> <!-- /main_content_wrapper -->

<?php include("includes/site_footer.php");?> <!-- ==== the footer is outside blueprint.css hence outside the container class=== -->
</div> <!-- /main-page -->

</body>
</html>