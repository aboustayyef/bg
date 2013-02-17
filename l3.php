<?php session_start(); $thispage ="collection" ;?>


<?php include("includes/site_header.php") ; ?> <!-- === Logo, contacts and searchbox === -->
<?php include("includes/site_navigation.php");?> <!-- === the site's navigation === -->

<div id ="main_content_wrapper" style = "clear:both">
	<div id = "bg_breadcrumbs" class ="span-24">
		<?php bg_dbconnect() ; ?>
		<?php display_breadcrumbs ($room, $category, NULL); ?>
	</div> <!-- Breadcrumbs end -->	

	<?php $headline = display_headline($room, $category, $product) ;?>
	<h2 class ="page_header"> <?php echo $headline ; ?> </h2>
	<?php 
		if ($_SESSION["loggedin"] == "bgmanagement") {
		 	;?>
		 	<div id="admin-tools" class ="span-24" style = "background:orange;">
		 		<div style ="padding:1em">
		 			<strong>ADMIN TOOLS :</strong>
		 			<a href="l3_edit.php?room=<?=$_GET['room'];?>&amp;category=<?=$_GET['category'];?>" style ="color:orange"><button>Edit Prices </button></a>
		 			<a href="l3_simple_list.php?room=<?=$_GET['room'];?>&amp;category=<?=$_GET['category'];?>" style ="color:orange" target ="new"><button>List All </button></a>
		 		</div>
		 	</div>
		 	<?php
		 } 
		
		?>

<div id ="bg_thumbnails" class ="span-24">

<?php 
	$query = "SELECT * FROM Categories WHERE cat_id = $category";
	$result = mysql_query($query);
	$poster_name =mysql_result($result, 0, "cat_poster");

	$query = "SELECT * FROM Products WHERE Prod_Parent_Category = $category AND Soldout IS NULL ORDER BY Prod_Name";
	$result = mysql_query($query);
	$num = mysql_numrows($result);
	$poster_exists ='';
	if ($poster_name) { // If the category in question is assigned a poster in the database 
		$poster_exists ="yes" ?> 
		<div class ="promotional-poster"><img src ="posters/<?php echo $poster_name ;?>" width ="370" height ="500" ></div>

<?php		
	} 
	$i=0;
	$position = 1;
	$modulo_factor = 5; // how many thumbnails per row
	if ("yes" == $poster_exists) { 
		$modulo_factor = 3; //will set back to 5 after thumbnail number 7
	}
	echo "<ul class = \"thumbnails\">";
	while ($i < $num) {
		$prod_id =mysql_result($result, $i, "Prod_ID");
		$prod_name =mysql_result($result, $i, "Prod_Name");
		$prod_description =mysql_result($result, $i, "Prod_Description");
		$prod_price = mysql_result($result, $i, "Product_Price");
		$first_variant_array = available_variants($prod_id);
		$first_variant = $first_variant_array[0];
		$prod_url = "browse.php?room=$room&category=$category&product=$prod_id&var=$first_variant" ;
		?>		 
		<li class ="square_box <?php if (0==($position)%$modulo_factor){echo "last"; } ?>">
		<a href = "<?php echo $prod_url ; ?>"><img src ="images/<?php echo $prod_id ; ?><?php echo $first_variant; ?>_thumb.jpg" ><br/>
		<strong class ="product_description"><?php echo $prod_name ; ?></strong></a>
		<br>
		<?php 
			if ($_SESSION["loggedin"] == "bgmanagement") { // user logged in, show secret items

  						setlocale(LC_MONETARY, 'en_US');
  						echo "GH&#162; ", money_format('%!.0n', $prod_price);

  			}
		 ?>
		</li>
			
<?php
		if (($poster_exists == "yes") && ($i > 5) && ($justonce == 0)) {
			$modulo_factor = 5 ; //height of poster now no longer in the way
			$position = $position + 4;
			$justonce = 1 ;
		}
		echo "<!-- num: $num i:$i -->";
		$i++;
		$position++;
	};
?>
</ul>
</div> <!-- bg_thumbnails -->
</div><!-- main_content wrapper -->
<?php include("includes/site_footer.php");?> <!-- ==== the footer is outside blueprint.css hence outside the container class=== -->
</div> <!-- Main page (page that surrounds the entire blue grid css page) -->
</body>
</html>
