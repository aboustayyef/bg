<?php 

require_once('init.php');

/*$connection = DB::getInstance();
$connection->get('Categories', array('cat_id','=','201'));
var_dump($connection->results());*/
$id = 223;
if (Products::category_has_poster($id)) {
	echo "Category $id has a poster";
} else {
	echo "Category $id doesn't have a poster";
}

//echo '<img src ="'.Products::get_thumb('product', 259).'">'; 
?>