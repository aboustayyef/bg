<?php session_start(); $thispage ="logout" ; ?>

<?php include("includes/site_header.php") ; ?> <!-- === Logo, contacts and searchbox === -->
<?php include("includes/site_navigation.php");?> <!-- === the site's navigation === -->

<div class="span-24">
<?php session_destroy(); ?>
<hr class="space">
<hr>
<script type="text/javascript">
	$(document).ready(function(){
		$("#loggedin").css("display","none");
	});
</script>
<h2>You have succesfully logged out</h2>
<h2>Click <a href="<?php echo BASE_URL ?>/">here</a> to return</h2>
</div>

<?php include("includes/site_footer.php"); ?>