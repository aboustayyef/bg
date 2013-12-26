<?php 

require_once('init.php');

/*$connection = DB::getInstance();
$connection->get('Categories', array('cat_id','=','201'));
var_dump($connection->results());*/

echo '<img src ="'.Products::get_thumb('product', 259).'">'; 
?>