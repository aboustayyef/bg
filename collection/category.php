<?php 
require_once('../init.php');

// the category number is brought forward as $category
/* for this page, we will need category details and category items*/

/*Get Category Details*/
$category_details = Products::get_category_details($category);

/* Get Category Descendents */

if (Products::has_subcategories($category)) {
	$subcategories = Products::get_descendants($category);
} else {
	$products = Products::get_descendants($category);
}

if (isset($subcategories)) {
	foreach ($subcategories as $key => $subcategory) {
		echo '<img src ="'.Products::get_thumb('category', $subcategory->cat_id).'">'; 
	}
}

if (isset($products)) {
	foreach ($products as $key => $product) {
		echo '<img src ="'.Products::get_thumb('product', $product->Prod_ID).'">'; 
	}
}

?>