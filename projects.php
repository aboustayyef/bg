<?php 
require_once('init.php');

$page_title = 'Projects at Blue Gallery';
$page_description = 'At Blue Gallery, we work closely with clients to help create the most effective office space solution to meet their specific needs';

include_once(ABSPATH.'views/header.php');
?>

		<div class="outer-row heading">
			<div class ="inner-row"><h2>Projects</h2></div>
		</div>
		<div class="outer-row breath">
			<div class="inner-row">
				<div class="aside wide">
					<img src="<?php echo WEBPATH.'images/pages/projects_main.jpg'; ?>" alt="">
				</div>
				<div class="content narrow">
					<h3>Let Us Help You</h3>
					<p>MORE THAN EVER, companies need work environments that engage their people, improve productivity and support the continuously changing business climate.</p>
					<p><strong>At Blue Gallery, we work closely with clients to help create the most effective office space solution to meet their specific needs and expectations.</strong></p>
					<p>With our expertise as well as valuable trade sources, we make sure to design a space that reflects your company's brand, mission and values.</p>
					<a href="<?php echo WEBPATH.'contact.php' ?>" class="btn">Contact Us</a>
					<p>Or Call us at: 0303300121</p>
				</div>
			</div>
		</div>

<?php 

include_once(ABSPATH.'views/footer.php');

?>