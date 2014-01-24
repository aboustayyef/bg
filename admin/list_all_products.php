<?php 
require_once('../init.php');
$connection = DB::getInstance();
/* Rooms */

include_once(ABSPATH.'views/header.php');
?>
<div class="outer-row breath">
	<div class="inner-row">
	<?php
		$rooms = $connection->get('Categories', array('cat_parent_id','=',0))->results();

		foreach ($rooms as $key => $room) {
			echo $room->cat_name.'<br>';
			show_categories($room->cat_id);
		}

		include_once(ABSPATH.'views/footer.php');

		?>	
	</div>
</div>

<?php 

function show_categories($room){
	$categories = Products::get_descendants($room);
	foreach ($categories as $key => $category) {
		echo str_repeat('&nbsp;', 2).$category->cat_name.'<br>';
		show_products($category->cat_id);
	}
}

function show_products($category){
	$products = Products::get_descendants($category);
	foreach ($products as $key => $product) {
		echo str_repeat('&nbsp;', 4).$product->Prod_Name.'<br>';
		show_variants($product->Prod_ID);
	}
}

function show_variants($product){
	$variants = Products::get_all_variants($product);
	
	foreach ($variants as $key => $variant) {
		echo str_repeat('&nbsp;', 8).$variant->Variant_Name.'<br>';
	}
}


?>