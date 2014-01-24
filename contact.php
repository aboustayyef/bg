<?php 
require_once('init.php');

$page='contact';
$page_title = 'Contact Us | Blue Gallery';
$page_description = 'Get in touch with us';

include_once(ABSPATH.'views/header.php');
?>

		<div class="outer-row heading">
			<div class ="inner-row"><h2>Get in Touch <small>Call us at +233 303 300 121 or use the form below</small></h2></div>
		</div>
		<div class="outer-row breath">
			<div class="inner-row">
				<div class="aside">
					<img src="<?php echo WEBPATH.'images/pages/about_bg_signage.jpg'; ?>" alt="">
				</div>
				<div class="content emailform">
					<input id="email" name="email" type="text" placeholder="youremail@example.com">
					<textarea name="message" id="message" rows="10">Enter Your email above, then your message here</textarea>
					<a id ="submit" href="#" class ="btn">Send</a>
				</div>
			</div>
		</div>

<?php 

include_once(ABSPATH.'views/footer.php');

?>