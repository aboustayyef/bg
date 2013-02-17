<?php session_start();
if (!($_SESSION["loggedin"] == "bgmanagement")) { //can't proceed
 die("Sorry, only logged in users can access this page");
}
	require_once('config.php') ; 
	require_once('functions.php') ;
?>
<!DOCTYPE html>

<?php $thispage = "edit"; ?>

<!-- Page: l4.php -->

<html lang = "en">
<head>
	<meta charset ="utf-8" />
	<title> [edit]
		<?php 
			bg_dbconnect() ; 
			$room = $_GET["room"]; 
			$category = $_GET["category"];
			$product = $_GET["product"];
			$var = (isset($_GET["var"])? $_GET["var"]:NULL);
			$variant_ID = $product.sprintf("%02d",$var);
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

<?php 
	bg_dbconnect();
	if ($_POST["submit"]) {
		$newname = clean_input($_POST["newname"]);
		$newdescription = clean_input($_POST["newdescription"]);
		$newtechdetails =clean_input($_POST["newtechdetails"]);
		$newprice =clean_input($_POST["newprice"]);
		$newamount =clean_input($_POST["newamount"]);
		$sql = "UPDATE Variants SET Variant_Name = '$newname' , Variant_Description = '$newdescription' , Note= '$newtechdetails', Amount_In_Stock= '$newamount', Variant_Price= '$newprice' WHERE Variant_ID='$variant_ID'";
		echo "<!-- $sql -->";
		$ok = mysql_query($sql);
;?>

<div class="success" style ="clear:both">Details updated!</div>

<?php
	}
?>

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

?>

<script>
	$(document).ready(function(){
		$(".success").animate({opacity:0}, 5000);
	});
</script>

<div id ="editing area" class ="span-24">
	<hr class="space">
	<hr class="space">
	<div class="span-2"><a href="<?php echo "browse.php?room=$room&category=$category&product=$product&var=$var" ?>"> &lt;&lt; back </a></div>
	<div class="span-10"><img src ="images/<?php echo $variant_ID ; ?>_large.jpg" style ="max-width:300px"></div>
	<div class="span-12 last">
	<form action = "<?php echo $_SERVER["PHP_SELF"],"?room=$room&category=$category&product=$product&var=$var"; ?>" method ="post">
		<strong>Name of Variant:</strong> <br><input class ="text" type ="text" name = "newname" id ="newname" value ="<?php echo $variant_name ; ?>"><br>
		<strong>Description:</strong><br> <textarea style ="width:300px;height:100px" name = "newdescription" id ="newdescription"><?php echo $variant_description ?></textarea><br>
		<strong>Technical Details:</strong><br> <textarea style ="width:300px;height:75px" name = "newtechdetails" id ="newtechdetails"><?php echo $technical_details_variant ?></textarea><br>		
		<strong>Price:</strong> <br> <input class ="text" type ="text" name = "newprice" id ="newprice" value ="<?php echo $variant_price ; ?>"><br>
		<strong>Amount in stock:</strong> <br> <input class ="text" type ="text" name = "newamount" id ="newamount" value ="<?php echo $variant_amount_in_stock ; ?>"><br>
		<input type ="submit" name ="submit" value ="submit" id ="submit"><br>
	</form>
	</div>
</div>

			
</div>
</div>

<?php include("includes/site_footer.php");?> <!-- ==== the footer is outside blueprint.css hence outside the container class=== -->

</div> <!-- Main Page -->
</body>
</html>




