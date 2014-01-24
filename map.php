<?php 
require_once('init.php');

$page_title = 'Find Us | Blue Gallery';
$page_description = 'Blue Gallery is at Aflao Road, Near Tema Roundabout, Tema, Ghana';

include_once(ABSPATH.'views/header.php');
?>

		<div class="outer-row heading">
			<div class ="inner-row"><h2>Find Blue Gallery <small>Click on the blue placemark for more details</small></h2></div>
		</div>
		<div class="outer-row">
			<iframe width="998" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps/ms?msid=214298567427427531482.0004d327b357282de0ad0&amp;msa=0&amp;ie=UTF8&amp;t=m&amp;ll=5.685683,-0.017853&amp;spn=0.014946,0.04077&amp;z=15&amp;output=embed"></iframe>
		</div>

<?php 

include_once(ABSPATH.'views/footer.php');

?>