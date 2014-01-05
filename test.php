<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 


require_once('init.php');

$all_items = array();
$start_index = 0;

$connection = DB::getInstance();
$level1 = $connection->query('SELECT cat_id FROM Categories WHERE cat_parent_id = 0')->results();
$all_items = $level1;
foreach ($level1 as $key => $category) {
	$level2 = Products::get_descendants($category);
	$all_items[$category] = $level2;
}

?>
<pre>
	<?php var_dump($all_items) ?>
</pre>

</body>
</html>
