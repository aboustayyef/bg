<?php 
require_once('init.php');

$page_title = 'About Blue Gallery';
$page_description = 'Blue Gallery is a one stop shop for premium Home and Office furniture in Ghana. Find out more.';

include_once(ABSPATH.'views/header.php');
?>

		<div class="outer-row heading">
			<div class ="inner-row"><h2>About Blue Gallery</h2></div>
		</div>
		<div class="outer-row breath">
			<div class="inner-row">
				<div class="aside">
					<img src="<?php echo WEBPATH.'images/pages/about_bg_signage.jpg'; ?>" alt="">
				</div>
				<div class="content">
					<h3>Who are we</h3>
					<p class ="lead"><strong>BLUE GALLERY</strong> is a one stop shop for premium Home and Office furniture in Ghana. Patrons of the store enjoy a shopping experience like no other. Our spacious showroom provides a great choice for variety seekers and uniqueness of goods. We give hints, tips and inspiration to help you get the best from what you buy from us.</p>
					<h3>Ownership</h3>
					<p>Blue Gallery is owned by <a href="http://tarzan.com.gh">Tarzan Enterprise Ltd</a>, a private family busines in Ghana. Tarzan started as a transport business, then has later expanded into real estate and trade. Tarzan is wholly owned by the Hamoui family</p>
					<h3>Our Location</h3>
					<p>Aflao Road, near Tema Roundabout, Opposite Shell station (Click for map >>)<br><strong>Tel:</strong> +233 303 300 121</p>
					<h3>Working Hours</h3>
					<table>
						<tr>
							<td>Monday-Friday</td>
							<td>09.00 - 17:30</td>
						</tr>
						<tr>
							<td>Saturday</td>
							<td>10.00 - 17:30</td>
						</tr>
					</table>
				</div>
			</div>
		</div>

<?php 

include_once(ABSPATH.'views/footer.php');

?>