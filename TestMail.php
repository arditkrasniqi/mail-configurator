<?php

require_once 'Mail.php';

$mail = new Mail("Name From", "Subject", "Body"); // Body con contain HTML elements also
if($mail->send()){
	echo 'Mail sent successfully';
}else{
	echo 'Error sending mail';
}