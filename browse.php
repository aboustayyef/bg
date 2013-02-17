<?php session_start(); // This page serves as a router. Depending on the parameters, it will direct to appropriate page (l2.php >> second level ..etc)
	require_once('config.php') ; 
	require_once('functions.php') ;
?> 

<?php
		$room= (isset($_GET["room"])? $_GET["room"]:NULL);
		$category= (isset($_GET["category"])? $_GET["category"]:NULL);
		$product= (isset($_GET["product"])? $_GET["product"]:NULL);
		$var = (isset($_GET["var"])? $_GET["var"]:NULL);
		$special = (isset($_GET["special"])? $_GET["special"]:NULL);
		$variant_ID = $product.sprintf("%02d",$var); // the variant id is concatinating product id and a number with format 00

if ($category == '') {
	require_once ('l2.php');	
}
elseif(strlen($special)>2) {
	require_once "lspecial.php";
} 
elseif ($product ==''){
	require_once "l3.php";
}
else{
	require_once "l4.php";
}

?>