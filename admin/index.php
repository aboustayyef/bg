<?php 
require_once('../init.php');

if (Users::isSignedIn()) {
	include_once(ABSPATH.'views/header.php'); 
	echo '<h2>Welcome, You are signed in</h2>';
	include_once(ABSPATH.'views/footer.php');
} else {
	die('you are not logged in');
}

?>