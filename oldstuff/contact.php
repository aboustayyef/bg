<?php session_start(); $thispage ="contact" ; ?>

<?php include("includes/site_header.php") ; ?> <!-- === Logo, contacts and searchbox === -->
<?php include("includes/site_navigation.php");?> <!-- === the site's navigation === -->

<div class="span-24">
	<hr>
	<h2>Get in touch <small> Phone: +233 303 300 121 | Email: bluegalleryghana@gmail.com</small></h2>
	<hr>
  <div class ="span-10 ">
    <img src ="design_images/350x400-contact-us-bg-website.jpg">
  </div>

	<div class="span-14 last">

<?php
  $to='bluegalleryghana@gmail.com';
  $messageSubject='[Blue Gallery Contact Form]';
  $confirmationSubject='Automatic response - Your message to blue gallery was sent';
  $confirmationBody=
<<<EMAILBODY
<div style ="width:95%;padding:1em;background:#F8F8F8;border: 1px solid #E8E8E8">
<h3>Hello,</h3>

<p>Thank you for your interest in Blue Gallery, Your destination for premium home and office furniture in Ghana.</p>

<p>We hope you had a wonderful time on <a href="http://bluegallery.com.gh?src=eml">our website.</a> Your message has been received and we will contact you again within 5 business days.</p>
<p>If you're in Ghana, feel free to pass by <a href ="http://bluegallery.com.gh/where.php?src=eml">our modern showroom</a> in Tema for a closer look of the amazing and tasteful collection we have.</p>
<p>Thank you and best regards,</p>
<p><strong>The email you sent appears below</strong></p><hr/><em>
EMAILBODY;
  
  $email='';
  $body='';
  $displayForm=true;
  if ($_POST){
    $email=stripslashes($_POST['email']);
    $body=stripslashes($_POST['body']);
    // validate e-mail address
    $valid=eregi('^([0-9a-z]+[-._+&])*[0-9a-z]+@([-0-9a-z]+[.])+[a-z]{2,6}$',$email);
    $crack=eregi("(\r|\n)(to:|from:|cc:|bcc:)",$body);
    if ($email && $body && $valid && !$crack){
      if (mail($to,$messageSubject,$body,'From: '.$email."\r\n")
          && mail($email,$confirmationSubject,$confirmationBody.$body."</em></div>",'From: '.$to."\r\n"."MIME-Version: 1.0\r\n"."Content-Type: text/html; charset=ISO-8859-1\r\n")){
        $displayForm=false;
?>

<hr><p class ="okay">Your message was successfully sent. In addition, a confirmation copy was sent to your e-mail address. Your message is shown below.</p>
<?php
        echo '<p>'.htmlspecialchars($body).'</p>';
      }else{ // the messages could not be sent
?>
<p class ="alert">Something went wrong when the server tried to send your message. This is usually due to a server error, and is probably not your fault. We apologise for any inconvenience caused.</p>
<?php
      }
    }else if ($crack){ // cracking attempt
?>
<p class ="alert">Your message contained e-mail headers within the message body. This seems to be a cracking attempt and the message has not been sent.</p>
<?php
    }else{ // form not complete
?>
<p class ="alert"><strong>Your message could not be sent. You must include both a valid e-mail address and a message.</strong></p>
<?php
    }
  }
  if ($displayForm){
?>

<form action = "<?php echo $_SERVER['PHP_SELF'] ;?>" method ="post">
<ul class ="contactus">
  <li><h3>Your email address:</h3></li>
  <li><input type="text" placeholder="youremail@sample.com" size="50" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>"></li>
  <li><h3>Message</h3></li>
  <li><textarea name="body" id="body" type="" class="" style="margin: 0px; width: 420px; height: 240px; "> </textarea></li>
  <li><button type="submit" class="btn">Submit</button></li>
  <li><br/>Important: by clicking "submit", you are sending us an email that will be read by a staff member as soon as possible. Please do not send unsolicited material, promotions or requests.</li>
</ul>
</form>


<?php
  }
?>
</div>
</div>

<?php include("includes/site_footer.php"); ?>