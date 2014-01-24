<?php 

/**
*   This script is solely for the sending me email
*   it is used for feedback and for blog suggestions
*   via an ajax request from lb pages
*
* 	==
*	IMPORTANT: ALL SANITIZATION AND VALIDATION SHOULD BE MADE AT CLIENT SIDE
*	===
*
*	required POST variables: key, kind & submittedText
*
*
*
*/ 

if (md5($_POST['key']) == 'd924165c69ca2a52b9863cb2b9c1342e') { //can proceed
	
	/*First, Send email to BG Management*/

	$to ="bluegalleryghana@gmail.com, mustapha.hamoui@gmail.com";
	$from = $_POST['from'];
	$subject = $_POST['from'];
	$message = $_POST['message'];

	$headers= "From: Potential BG Customer <".$from.">\r\n";

	if(mail($to,$subject,$message,$headers)){ //success
		echo "Email Sent Succesfully";
	}else {
		echo "There was an error in sending the email";
	};
} else {
	die("failure to authenticate");
}
?>