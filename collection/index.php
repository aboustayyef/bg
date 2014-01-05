<?php 
require_once('../init.php');

/*
This is just a routing page 
it depends on URL Parameters to redirect
requirements: 'cat' or 'prod' parameters
*/

if ((!isset($_GET['cat']) || empty($_GET['cat'])) && (!isset($_GET['prod']) || empty($_GET['prod']))) {
	die('page needs category or product id to proceed');
} else {
	#proceed ;
}

$cat = isset($_GET['cat'])? $_GET['cat']: NULL;
$prod = isset($_GET['prod'])? $_GET['prod']: NULL;


if ($cat) {
	if (Products::category_exists($cat)) {
		$category = $cat;
		include_once('category.php');
	} else {
		die("Category $cat doesn't exists");
	}
}

if ($prod) {
	if (Products::product_exists($prod)) {
		$product = $prod;
		include_once('product.php');
	} else {
		die("Product $prod doesn't exists");
	}
}
?>