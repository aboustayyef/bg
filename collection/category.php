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
	$descendants_type = 'category';
	$desc_key = 'cat_id';
	$desc_name = 'cat_name';
	$desc_description= 'cat_description';
} else {
	$descendants_type = 'product';
	$desc_key = 'Prod_ID';
	$desc_name = 'Prod_Name';
	$desc_description= 'Prod_Description';
}

/* Collect descendent details, to use for rendering */
$items = array();
$count = 0;
foreach ($descendants as $key => $descendant) {

	//Skip Products that don't have stock
	if ($descendants_type == 'product') {
		if (!Products::product_has_stock($descendant->$desc_key)) {
			//ignore products that don't have stock
			continue;
		}
	}

	$items[$count]['name'] =  $descendant->$desc_name;
	$items[$count]['thumb'] = Products::get_thumb($descendants_type, $descendant->$desc_key);
	$items[$count]['link'] = Render::make_link($descendants_type, $descendant->$desc_key);
	$items[$count]['description'] = $descendant->$desc_description;
	$count +=1;
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
<div class="outer-row">
	<div class="inner-row">
		<div id ="breadcrumbs"> 
			<?php echo Render::draw_breadcrumbs('category', $category); ?>
		</div>
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

<?php
include_once(ABSPATH.'views/footer.php');


?>