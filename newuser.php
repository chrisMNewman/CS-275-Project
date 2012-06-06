<?php
session_start(); 
require("common.php");

if ((strlen($_POST['username']) < 4) or (strlen($_POST['username']) > 30)){
	$username_length_error = true;
}

if ((strlen($_POST['password']) < 8) or (strlen($_POST['password']) > 32)){
	$password_length_error = true;
}

if (strcmp($_POST['password'], $_POST['password_confirm']) != 0){
	$password_match_error = true;
}


if (!($username_length_error or $password_length_error or $password_match_error)){

	header( 'Location: '.$homepage ) ;
}
else{
	$return_url = $homepage.'register.php?';

	if ($username_length_error){
		$return_url .= 'username_length_error=1&';
	}

if ($password_length_error){
		$return_url .= 'password_length_error=1&';
	}

if ($password_match_error) != 0){
		$return_url .= 'password_match_error=1&';
	}

    header( 'Location: '.$return_url ) ;
}
?>