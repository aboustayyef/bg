<?php session_start();$thispage ="about" ; ?>

<?php include("includes/site_header.php") ; ?> <!-- === Logo, contacts and searchbox === -->
<?php include("includes/site_navigation.php");?> <!-- === the site's navigation === -->

<div id="container" class ="span-24">
	<hr>
		<h2 id ="about-bg">About Blue Gallery</h2>
	<hr>
	<div id="left-column" class ="span-8">
		<img src ="design_images/280x139_bg_signage.jpg">
	</div>

	<div id="right-column" class ="span-16 last">
  			<p><strong>BLUE GALLERY</strong> is a one stop shop for premium Home and Office furniture in Ghana. </p>
  			<p>Patrons of the store enjoy a shopping experience like no other. Our spacious showroom provides a great choice for variety seekers and uniqueness of goods. We give hints, tips and inspiration to help you get the best from what you buy from us. </p>
			<h2 id ="about-ownership">Ownership</h2>
			<p>Blue Gallery is owned by <a href ="http://tarzan.com.gh">Tarzan Enterprise Ltd</a>, a private family busines in Ghana. Tarzan started as a transport business, then has later expanded into real estate and trade. Tarzan is wholly owned by the Hamoui family</p>
			<h2 id ="about-location">Our Location</h2>
				<address>
					Aflao Road, near Tema Roundabout, Opposite Shell station (<a href ="where.php">Click for map >></a>)<br><strong> Tel: </strong>+233 303 300 121 
				</address>
	      	<h2 id ="about-working-hours">Working Hours</h2>
	    <table id="working-hours"> 
				<tbody>
 				<tr> <td class="Body" width ="100px">Monday-Friday</td> <td class="Body">09.00 - 17:30</td> </tr> 
 				<tr> <td class="Body">Saturday</td> <td class="Body">10.00 - 17.30</td> </tr> 
			   </tbody>
       </table>	
	</div>
</div>
<?php include("includes/site_footer.php"); ?>