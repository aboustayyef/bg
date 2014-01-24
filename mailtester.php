<?php 
	$from = 'mustapha.hamoui@gmail.com';
	$headers= "From: Potential BG Customer <".$from.">\r\n";
	$to = 'mustapha@hamoui.com';
	$subject = 'testing. Cool eh?';
	$message = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, inventore vel repellat eveniet maxime ipsam libero nobis animi repellendus eligendi.";
	mail($to,$subject,$message,$headers);

?>