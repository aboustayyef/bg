<?php 
require_once('../init.php');

/*
the product number is brought forward as $product
for this page, we will need product details
*/

$product_details = Products::get_product_details($product); // array
$parent_details = Products::get_parent_details('product',$product);
$variants = Products::get_available_variants($product);

$page_title = $product_details->Prod_Name.' in '.$parent_details->cat_name.' at Blue Gallery';
$page_description = '';

// add facebook specific details

include_once(ABSPATH.'views/header.php');

?>
<!-- breadcrumbs -->
<div id = "breadcrumbs" class="outer-row">
	<div class="inner-row">
			<?php echo Render::draw_breadcrumbs('product', $product); ?>
	</div>
</div>
<?php
?>

<!-- product name -->
<div class="outer-row">
	<div class="inner-row">
		<?php echo '<h2 class ="product-name">',$product_details->Prod_Name,'</h2>'; ?>
		<?php $firstVariant = $variants[0];  ?>
		<?php echo '<h3 class ="variant-name">',$firstVariant->Variant_Name,'</h3>'; ?>
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
	
		/*Check if product has variants */
		if (count($variants)>1) {
			/* If it has, display thumbs */
			echo '<h2>Colors / Variants</h2>';
			echo '<div class ="thumbs">';
			foreach ($variants as $key => $variant) {
				$variant_id = $variant->Variant_ID;
				$variant_name = $variant->Variant_Name;
				$variant_technical = $product_details->Technical_Details;

				// If variant description is empty, use product's description
				$variant_description = empty($variant->Variant_Description)? $product_details->Prod_Description : $variant->Variant_Description;

				echo '<img src ="'.WEBPATH.'images/products/thumbs/'.$variant_id.'_thumb.jpg" data-description="'.$variant_description.'" data-name="'.$variant_name.'" data-technical ="'.$variant_technical.'" data-id="'.$variant_id.'">';
			}
			echo '</div>';
		} else {
			$variant = $variants[0];
		}
		$variant_description = empty($variant->Variant_Description)? $product_details->Prod_Description : $variant->Variant_Description;
		$variant_technical = $product_details->Technical_Details;
		echo '<h2>Product Description</h2>';
		echo '<p class ="product-description">'.$variant_description.'</p>';
		echo '<h2>Technical Details</h2>';
		echo '<p class ="product-technical-details">'.$variant_technical.'</p>';

		?>			
		</div>

	</div>
</div>
<?php 
	if (Products::product_collection($product)) {

		$collection_name = Products::product_collection($product)->Collection_Name;
		$collection_type = Products::product_collection($product)->Collection_Type;
		switch ($collection_type) {
			case 'comes_with':
					$relationship_description = 'This '.$collection_name.' product comes as part of a set';
				break;

			case 'model':
					$relationship_description = 'Also in the '.$collection_name.' series';
				break;
			
			default:
				die('Collection type not valid');
				break;
		}

		$collection = Products::get_collection($collection_name);
		$items = Products::convert_to_items('product', $collection);
?>

	<div class="outer-row">
		<hr>
		<div class="inner-row">
			<h2 class ="sectionhead">
				<?php 
					echo $relationship_description; 
				?>
			</h2>
			<?php 	Render::draw_grid($items); ?>
		</div>
	</div>

<?php
	}

?>


<div class="outer-row">
	<hr>
	<div class="inner-row">
		<h2 class ="sectionhead">More in <?php echo $parent_details->cat_name; ?></h2>
		<?php 
			$siblings = Products::get_product_siblings($product);
			$items = Products::convert_to_items('product', $siblings);
			Render::draw_grid($items);
		?>
	</div>
</div>

<div class="outer-row">
	<hr>
	<div class="inner-row">
		<?php 
			$grandpa = Products::get_product_grandpa($product);
		?>
		<h2 class ="sectionhead">More in <?php echo $grandpa['name'] ?></h2>
		<?php 
			$uncles = Products::get_uncle_categories($product);
			$items = Products::convert_to_items('category', $uncles);
			Render::draw_grid($items);
		?>
	</div>
</div>
 
<?php


echo BEGINROW;

// draw_grid requires an array $items with keys 'name', 'link', 'description' & 'thumb'
// Render::draw_grid($items);

echo ENDROW;
include_once(ABSPATH.'views/footer.php');


?>