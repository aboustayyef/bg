<?php 
require_once('../init.php');

// the category number is brought forward as $category
/* for this page, we will need category details and category items*/

/*Get Category Details*/
$category_details = Products::get_category_details($category);


/* Get Category Descendents */
$descendants = Products::get_descendants($category);

/* Find out the type of descendants. We need that detail to produce urls */
if (Products::has_subcategories($category)) {
	$items = Products::convert_to_items('category', $descendants);
}else{
	$items = Products::convert_to_items('product', $descendants);
}

/*
	Display part begins
*/

/* Get title and description of page */
$page_title = $category_details->cat_name . ' at Blue Gallery';
$page_description = '';
// To Do: add facebook specific details

include_once(ABSPATH.'views/header.php');

?>

<!-- Breadcrumbs -->
<div id = "breadcrumbs" class="outer-row">
	<div class="inner-row">
			<?php echo Render::draw_breadcrumbs('category', $category); ?>
	</div>
</div>
<?php
?>

<div class="outer-row">
	<div class="inner-row">
		<?php echo '<h2 class ="productname">',$category_details->cat_name,'</h2>'; ?>
	</div>
</div>

<div class="outer-row">
	<div class="inner-row">
<?php

/* If this is a room , use the list view. Otherwise, use the gird view */

if ($category_details->cat_parent_id == 0) {
	$room_poster = Products::get_room_poster($category);
	Render::draw_list($items, $room_poster);
} else {
	$category_poster = Products::get_category_poster($category);
	Render::draw_grid($items, $category_poster);
}
?>
	</div>
</div>

<div class="outer-row">
	<div class="inner-row">
		<p>For inquiries about furniture prices and availability, <a href="/contact.php">contact</a> our sales department</p>
	</div>
</div>


<?php
include_once(ABSPATH.'views/footer.php');


?>