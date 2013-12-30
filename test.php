<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 


require_once('init.php');
$br = Render::draw_breadcrumbs('category', 201);

echo $br;

//echo Products::get_parent('category',202);

/*$connection = DB::getInstance();
$connection->get('Categories', array('cat_id','=','201'));
var_dump($connection->results());*/



//echo '<img src ="'.Products::get_thumb('product', 259).'">'; 
?>
</body>
</html>
