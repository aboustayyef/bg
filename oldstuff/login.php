<?php session_start(); $thispage ="login" ; ?>

<?php include("includes/site_header.php") ; ?> <!-- === Logo, contacts and searchbox === -->
<?php include("includes/site_navigation.php");?> <!-- === the site's navigation === -->

<div class="span-24">
<?php 
	
	$username ="bluegallery";
	$password ="#TheManagement#";

	if ($_POST["submit"]) { // form was submitted
		$entered_username = $_POST["username"];
		$entered_password = $_POST["password"];

		if ($entered_username && $entered_password) { // user has entered both a username and a password
			if ($entered_username==$username && $entered_password==$password) {
				;?>
				<hr class="space"><hr>
				<p>You're now Logged in as management. Don't forget to log out when you're done</p>
				<?php $_SESSION["loggedin"] = "bgmanagement"; ?>
				
				<?php	
			} else {
				display_login_form($entered_username,$entered_password,"Your login information is not correct. Please try again."); 
			}
			
		} else { // one or both fields are empty
			display_login_form($entered_username,$entered_password,"You have to enter both a username and a password"); 
		}
		
	} else {
		display_login_form(NULL,NULL,NULL);
	}

	function display_login_form($user,$pass,$err_message) {
		echo "<hr class =\"space\">";
		echo "<hr>";
		echo "<hr class =\"space\">";

		if ($err_message){
		 	echo "<div class =\"error\">$err_message</div>";
		 } ?>
		 
		 <form action ="<?php echo $_SERVER['PHP_SELF']; ?>" method ="post">
		 	<label for "username">Username:</label> <input id ="username" type = "text" class ="text" name ="username" <?php if ($user){echo "value = \"$user\"";} ?>><br>
		 	<label for "password">Password:</label> <input id ="password" type = "password" class ="text" name ="password" <?php if ($pass){echo "value = \"$pass\"";} ?>><br> 
		 	<label for "submit"></label><input type = "submit" name ="submit" value = "submit">
		 

		 </form>
		 
		 <?php 
	}
		
 ?>

</div>

<?php include("includes/site_footer.php"); ?>