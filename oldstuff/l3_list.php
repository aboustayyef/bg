<?php session_start(); $thispage ="list" ;
if (!($_SESSION["loggedin"] == "bgmanagement")) { //can't proceed - not logged in
 die("Sorry, only logged in users can access this page");
} ?>


<?php include("includes/site_header.php") ; ?> <!-- === Logo, contacts and searchbox === -->
<?php include("includes/site_navigation.php");?> <!-- === the site's navigation === -->

<div id ="main_content_wrapper" style = "clear:both">
	<div id = "bg_breadcrumbs" class ="span-24">
		<?php bg_dbconnect() ; ?>
		<?php display_breadcrumbs ($room, $category, NULL); ?>
	</div> <!-- Breadcrumbs end -->	

	<?php $headline = display_headline($room, $category, $product) ;?>
	<h2 class ="page_header"> <?php echo $headline ; ?> </h2>

<div id ="bg_list" class ="span-24">

<?php 

	$query = "SELECT * FROM Products WHERE Prod_Parent_Category = $category AND Soldout IS NULL ORDER BY Prod_Name";
	$result = mysql_query($query);
	while ($product_row = mysql_fetch_assoc($result)) 
	{
		echo "<h3>", $product_row['Prod_Name'], "</h3>";
		$row_id = $product_row['Prod_ID'];
		$query2 = "SELECT * FROM Variants WHERE Parent_Product_ID = $row_id AND Amount_In_Stock > 0 ORDER BY Variant_ID";
		$result2 = mysql_query($query2);
		;?>
		
		<table>
			<thead>
				<tr>
					<th class ="span-3">thumbnail</th>
					<th class ="span-4">Name</th>
					<th class ="span-4">Price</th>
					<th class ="span-13">Amount in Stock</th>
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
			echo "<td><img src =\"images/",$variant_row['Variant_ID'],"_thumb.jpg\" width =\"65px\" height =\"65px\"></td>";
			echo "<td>",$variant_row['Variant_Name'],"</td>";
			echo "<td>",money_format('%.0n', $variant_price),"</td>" ;
			echo "<td>",$variant_row['Amount_In_Stock'],"</td>";
			echo "</tr>";
		}
		;?>
		</tbody>
		</table>
		
		<?php
	}
	;?>
	

</div> <!-- bg_list -->
</div><!-- main_content wrapper -->
<?php include("includes/site_footer.php");?> <!-- ==== the footer is outside blueprint.css hence outside the container class=== -->
</div> <!-- Main page (page that surrounds the entire blue grid css page) -->
</body>
</html>
