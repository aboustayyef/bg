<?php 
require_once('../init.php');

/*
the product number is brought forward as $product
for this page, we will need product details
*/

$product_details = Products::get_product_details($product); // array
$parent_details = Products::get_parent_details('product',$product);
$variants = Products::get_available_variants($product);
/* Find variations */

/* 
	See if there are related items (and nature of relationship) 
	$items_related = array of arrays with keys 'name', 'link', 'description' & 'thumb'
*/

/* 
	Find products in the same category
	$items_same_category = array of arrays with keys 'name', 'link', 'description' & 'thumb'
*/

/*
	Display part begins
*/

$page_title = $product_details->Prod_Name.' in '.$parent_details->cat_name.' at Blue Gallery';
$page_description = '';

// add facebook specific details

include_once(ABSPATH.'views/header.php');

?>
<!-- breadcrumbs -->
<div class="outer-row">
	<div class="inner-row">
		<div id ="breadcrumbs"> 
			<?php echo Render::draw_breadcrumbs('product', $product); ?>
		</div>
	</div>
</div>
<?php
?>

<!-- product name -->
<div class="outer-row">
	<div class="inner-row">
		<?php echo '<h2 class ="product-name">',$product_details->Prod_Name,'</h2>'; ?>
	</div>
</div>


<!-- details -->
<div class="outer-row">
	<div class="inner-row">

		<div class="product-pic">
			<img src="<?php echo WEBPATH.'images/products/large/'.$variants[0]->Variant_ID.'_large.jpg'; ?>" data-pic="<?php echo $variants[0]->Variant_ID; ?>" alt="">
		</div>
		
		<div class="product-details">
		<?php 

		echo '<div class ="thumbs">';
		foreach ($variants as $key => $variant) {
			
			$variant_id = $variant->Variant_ID;
			$variant_name = $variant->Variant_Name;
			$variant_technical = $product_details->Technical_Details;

			// If variant description is empty, use product's description
			$variant_description = empty($variant->Variant_Description)? $product_details->Prod_Description : $variant->Variant_Description;

			echo '<img src ="'.WEBPATH.'images/products/thumbs/'.$variant_id.'_thumb.jpg" data-description="'.$variant_description.'" data-name="'.$variant_name.'" data-technical ="'.$variant_technical.'" data-id="'.$variant_id.'">';
		}

		echo '<h2>Product Description</h2>';
		echo '<p class ="product-description">'.$variant_description.'</p>';
		echo '<h2>Technical Details</h2>';
		echo '<p class ="product-technical-details">'.$variant_technical.'</p>';

		echo '</div>';



		?>			
		</div>

	</div>
</div>

<?php


echo BEGINROW;

// draw_grid requires an array $items with keys 'name', 'link', 'description' & 'thumb'
// Render::draw_grid($items);

echo ENDROW;
include_once(ABSPATH.'views/footer.php');


?>