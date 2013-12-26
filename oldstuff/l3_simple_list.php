<?php session_start(); $thispage ="list" ;
if (!($_SESSION["loggedin"] == "bgmanagement")) { //can't proceed - not logged in
 die("Sorry, only logged in users can access this page");
} ?>
<?php 
	date_default_timezone_set('UTC');
	include("config.php"); 
 	include("functions.php") ; 
 	bg_dbconnect() ; 
 	$category = $_GET['category'];
 	$room = $_GET['room'];
 	setlocale(LC_MONETARY, "en_US");
?>


<!DOCTYPE html>
<html lang="en">
 
  <head>
    <meta charset="utf-8">
    <title>Print</title>
    <style type="text/css">
	    table { page-break-inside:auto }
	    tr    { page-break-inside:avoid; page-break-after:auto }
	    thead { display:table-header-group }
	    tfoot { display:table-footer-group }
	</style>

  </head>
 
  <body>
  	<!-- test -->
  	<div style ="width:90%;margin:auto">
    <?php $headline = display_headline($room, $category, NULL) ;?>
<img src ="design_images/bg_logo_website_468x262.png" width ="117" >

<h3> <?php echo $headline ; echo " <small> [ generated on ", date('l jS \of F Y h:i:s A')," ]</small>"?> </h3>
<?php 

	$query = "SELECT * FROM Products WHERE Prod_Parent_Category = $category AND Soldout IS NULL ORDER BY Prod_Name";
	$result = mysql_query($query);
	while ($product_row = mysql_fetch_assoc($result)) 
	{
		
		$row_id = $product_row['Prod_ID'];
		$query2 = "SELECT * FROM Variants WHERE Parent_Product_ID = $row_id AND Amount_In_Stock > 0 ORDER BY Variant_ID";
		$result2 = mysql_query($query2);
		;?>
		
		<table BORDER=1 CELLPADDING=2 CELLSPACING=1 RULES=ROWS width ="100%" style ="margin-bottom:5px">
			<thead>
				<tr style ="text-align:left;">
					<th style ="width:15%"><?php echo $product_row['Prod_Name']; ?></th>
					<th style ="width:55%">Description</th>
					<th style ="width:15%">Price</th>
					<th style ="width:15%">In Stock</th>
				</tr>
			</thead>
			<tbody>

		<?php
		while($variant_row = mysql_fetch_assoc($result2))
		{
			if ($variant_row['Variant_Price'] == NULL) 
			{
				$variant_price = $product_row['Product_Price'];
			} 
			else
			{
				$variant_price = $variant_row['Variant_Price'];
			}
			echo "<tr>";
			echo "<td><img src =\"images/",$variant_row['Variant_ID'],"_thumb.jpg\" width =\"50px\" height =\"50px\"></td>";
			echo "<td>",$variant_row['Variant_Name'],"</td>";
			echo "<td> GH&#162; ",money_format('%!.0n', $variant_price),"</td>" ;
			echo "<td>",$variant_row['Amount_In_Stock'],"</td>";
			echo "</tr>";
		}
		;?>
		</tbody>
		</table>
		
		<?php
	}
	;?>
</div>
  </body>

</html>



