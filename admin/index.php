<?php 
$login_alert = ""; //first time
$username ="stayyef";
$password ="mypassword";
function displayform($login_alert){ ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Administer Blue Gallery</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	</head>
	<body>
		<div class ="container">
			<div class ="row">&nbsp;</div>
			<div class ="span12">
				<h1>Administer Blue Gallery</h1>
			</div>
			<div class ="span12">
				<legend>Please Sign in</legend>
				<?php 
					if ($login_alert) { ?>				
					<div class="alert alert-error">
						<?php echo $login_alert ; ?>
					</div>
				<?php }	?>
				<form name = "login" action ="index.php" method ="post">
					<label for ="username">Username:</label>
					<input type ="text" name ="username" placeholder ="User Name">
					<label for ="password">Password:</label>
					<input type ="password" name ="password" placeholder ="Password">
					<br/><button type ="submit" class ="btn">Submit</button>
				</form>
			</div>
		</div>
	</body>
</html>
<?php } ?>

<?php 
	if (!isset($_POST["username"]) && !isset($_POST["password"])) { //empty form
		displayform();
	} elseif ($_POST["username"] !== $username || $_POST["password"] !== $password ) { //wrong credentials
		$login_alert = "Wrong Username / Password combination . Please try again";
		displayform($login_alert);
	 } else { //everything is ok ?>

	 	<!DOCTYPE html>
	 	<html>
	<head>
		<title>Administer Blue Gallery</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	</head>
	 	<body>
	 	<div class ="container">
	 	<h1 class ="hero">We're now in the protected zone</h1>
	 	</div>
	 	</body>
	 	</html>
		 
	 <?php
	 }
?>
