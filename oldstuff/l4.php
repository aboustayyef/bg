<?php session_start(); ?>
<!DOCTYPE html>

<?php $thispage = "collection"; ?>

<!-- Page: l4.php -->

<html lang = "en">
<head>
	<meta charset ="utf-8" />
	<title>
		<?php 
			bg_dbconnect() ; 
			echo display_title($room, $category, $product);
		?>
	</title>
	<?php load_stylesheet() ;?>
	<!-- The script below is for replacing the image with that of the thumbnail clicked -->
</head>
	<?php include("includes/site_header.php") ; ?> <!-- === Logo, contacts and searchbox === -->
	<?php include("includes/site_navigation.php");?> <!-- === the site's navigation === -->
	<div id ="main_content_wrapper" style = "clear:both">
	<div id ="main_content" class ="span-24">
	<div id = "bg_breadcrumbs" class ="span-24">

<?php bg_dbconnect() ; ?>
<?php /*Breadcrumbs ============================== */	
	display_breadcrumbs ($room, $category, $product);
?>
</div>

<?php //preparing data

		$query = "SELECT * FROM Products WHERE Prod_ID = $product"; $result = mysql_query($query);
		$prod_name = mysql_result($result, 0, "Prod_Name");
		$prod_description = mysql_result($result, 0, "Prod_Description");
		$technical_details_product = mysql_result($result, 0, "Technical_Details");
		$prod_collection = mysql_result($result,0, "Collection_Name");
		$prod_collection_type =mysql_result($result,0, "Collection_Type");
		$prod_price = mysql_result($result,0,"Product_Price");

		$query2 = "SELECT * FROM Variants WHERE variant_ID = $variant_ID AND Amount_In_Stock > 0"; $result2 = mysql_query($query2);
		$variant_name = mysql_result($result2, 0, "Variant_Name");
		if (strlen($variant_name)<2) {$variant_name = $prod_name ; } //makes sure name is not left empty. Will substitute variant name for product name.
		$variant_description = mysql_result($result2,0,"Variant_Description");
		if (strlen($variant_description) < 2) { $variant_description = $prod_description ;} // makes sure variant description trumps product description
		$technical_details_variant = mysql_result($result2, 0, "Note");
		$variant_price = mysql_result($result2, 0, "Variant_Price");
		if (!($variant_price)) { // no price is set for variant. Substitute with product Price
			$variant_price = $prod_price;
		}
		$variant_amount_in_stock = mysql_result($result2, 0, "Amount_In_Stock");
		// The formulation below gives priority to technical details if provided in the Variant, otherwise it will use the general one in the product
		$technical_details = ($technical_details_variant == "" )? $technical_details_product : $technical_details_variant ;
		$variant_edit_url = "edit.php?room=$room&category=$category&product=$product&var=$var";

?>

<div id="product_wrapper" class ="span-24"> 
	<div id ="name_and_photo" class = "span-14 ">
		<h2 class="product_name"><?php echo $variant_name; ?>
		<?php if ($_SESSION["loggedin"] == "bgmanagement") {
			;?>
			
			<small><a href="<?php echo $variant_edit_url ; ?>"> edit </a></small>
			
			<?php
		} ?>
		</h2>
		<!-- <div id="loading_image"><img src ="design_images/ajax-loader.gif"></div> -->
		<img src ="images/<?php echo $variant_ID ; ?>_large.jpg">
	</div>
	<div id="more_info" class = "span-8">

   <?php

/*Find out how many variants product has*/
		$query = "Select * FROM Variants WHERE Parent_Product_ID =$product AND Amount_In_Stock > 0";
		$result = mysql_query($query);

/*list all variants*/ 
;?>
			
<?php 
		
		$howmanyvariants = available_variants($product);
		if (count($howmanyvariants) >1 ){ 
		// make sure there's more than one variant
			echo '<h3 class = "details">Variants/Colors</h3>';
			echo '<ul class ="list_of_variants">';
			while($rows = mysql_fetch_array($result)) 
			{
				/*prepare variables to work with*/
				$variant_alternative_name = $rows['Variant_Name'];
				$variant_alternative_ID = $rows['Variant_ID'];
				$variant_alternative_number = substr($variant_alternative_ID,3,2);
				$variant_alternative_image_url = "images/$variant_alternative_ID"."_thumb.jpg";
		      	$variant_alternative_url = "browse.php?room=$room&category=$category&product=$product&var=$variant_alternative_number";
				/*Use above variables to display the different variants*/
				echo "<li class =\"variant_box";
				if ($variant_alternative_number == $_GET["var"]) 
				{
					echo " selected";
				}
				echo "\"><a href =\"$variant_alternative_url\"><img src =\"$variant_alternative_image_url\" title =\"$variant_alternative_name\" width =\"65\"></a></li>";
			}
			echo "</ul>";
		}
?>

		


      	<?php  
      		if (strlen($prod_description) > 5) { ;?>
 	    	<h3 class="details">Product Description</h3>
 	    	<p class ="category-description gray"> <?php echo $variant_description ; ?> </p>
    	<?php       } ?>
      <?php  
      	if (strlen($technical_details)>2) { // Technical details are set
      		;?>
      		<h3 class="details">Technical Details</h3>
   		   <pre><?php echo $technical_details ; ?></pre> 
  		<?php  	}?>
  		<?php 
  			if ($_SESSION["loggedin"] == "bgmanagement") { // user logged in, show secret items
  				;?>
  				
  				<h3 class="details secret"><b>Price :</b> 
  					<?php 
  						setlocale(LC_MONETARY, 'en_US');
  						echo "GH&#162; ", money_format('%!.0n', $prod_price);
  					?> 
  					<br><b>Amount in Stock:</b> <?php echo $variant_amount_in_stock ?> </h3>
 				
  				<?php
  			}
  		 ?>
          
	
	</div>
</div>

<?php 
	if ($prod_collection) {
		display_thumbnails_of_same_collection($prod_collection, $prod_collection_type, 5);
	}
	display_thumbnails_of_same_category($category, 5);
	display_thumbnails_of_same_room($room, 5);
?>
</div>
</div>

<?php include("includes/site_footer.php");?> <!-- ==== the footer is outside blueprint.css hence outside the container class=== -->

</div> <!-- Main Page -->
</body>
</html>




