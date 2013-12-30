<?php 
require_once('../init.php');

// the category number is brought forward as $category
/* for this page, we will need category details and category items*/

/*Get Category Details*/
$category_details = Products::get_category_details($category);


/* Get Category Descendents */
$descendants = Products::get_descendants($category);

/* Find out the type of descendants (products or categories, to be used to produce urls) */
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
//echo $descendants_type;
/* Collect descendent details, to use for rendering */
$items = array();
foreach ($descendants as $key => $descendant) {
	$items[$key]['name'] =  $descendant->$desc_name;
	$items[$key]['thumb'] = Products::get_thumb($descendants_type, $descendant->$desc_key);
	$items[$key]['link'] = Render::make_link($descendants_type, $descendant->$desc_key);
	$items[$key]['description'] = $descendant->$desc_description;
}


/*
	Display part begins
*/

$page_title = '';
$page_description = '';
// add facebook specific details

include_once(ABSPATH.'views/header.php');

echo '<div class ="outer-row"><hr></div>';

echo BEGINROW;
echo Render::draw_breadcrumbs('category', $category);
echo ENDROW;

echo BEGINROW;
echo '<h2>',$category_details->cat_name,'</h2>';
echo ENDROW;

echo BEGINROW;
Render::draw_grid($items, Products::get_category_poster($category));
echo ENDROW;
include_once(ABSPATH.'views/footer.php');


?>