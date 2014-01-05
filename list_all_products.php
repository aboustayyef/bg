<?php 
require_once('init.php');
$connection = DB::getInstance();
$all_variants = $connection->query('SELECT * FROM Variants ORDER BY Parent_Product_ID ASC')->results();
$product_in_focus ="";
foreach ($all_variants as $key => $variant) {
	if ($variant->Parent_Product_ID == $product_in_focus) {
		echo $variant->Variant_Name.'<br>';
	} else {
		echo '<hr>';
		echo '<strong>'.Products::get_product_name($variant->Parent_Product_ID).'</strong><br>';
		echo $variant->Variant_Name.'<br>';
		$product_in_focus = $variant->Parent_Product_ID;
	}
	
}
?>