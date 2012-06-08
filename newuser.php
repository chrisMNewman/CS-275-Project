<?php
session_start(); 
<<<<<<< HEAD
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
=======
include("common.php");

$username = $_POST['username'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

if(empty($username) or empty($password) or empty($password_confirm)){
	//empty field(s), return error message
	exit('<meta http-equiv="refresh" content="0; url=' . urldecode($homepage.'register.php?empty_field_error').'"/>'); 
}
else{ //no empty fields, attempt to validate form
	if ((strlen($username) < 4) or (strlen($username) > 30)){
		$username_length_error = true;
	}
	else $username_length_error = false;

	if ((strlen($password) < 8) or (strlen($password) > 32)){
		$password_length_error = true;
	}
	else $password_length_error = false;

	if (strcmp($password, $password_confirm) != 0){
		$password_match_error = true;
	}
	else $password_match_error = false;

	if (!($username_length_error or $password_length_error or $password_match_error)){
		//form validated, check database

		$query = 'SELECT COUNT(*) FROM `User` WHERE Screen_Name = '.$username;
		$result = $db->query($query);
		$row = $result->fetch_row()
	    if($row[0] > 0){
	    	exit('<meta http-equiv="refresh" content="0; url=' . urldecode($homepage.'register.php?username_taken') . '"/>');
	    }

		exit('<meta http-equiv="refresh" content="0; url=' . urldecode($homepage) . '"/>'); 
	}
	else{  //form invalid, return error messages
		$return_url = $homepage.'register.php?';

		if ($username_length_error){
			$return_url .= 'username_length_error&';
		}
		else{
			$return_url .= 'username='.$username.'&';
		}

		if ($password_length_error){
			$return_url .= 'password_length_error&';
		}

		if ($password_match_error){
			$return_url .= 'password_match_error&';
		}

	    exit('<meta http-equiv="refresh" content="0; url=' . urldecode($return_url) . '"/>'); 
 	}
>>>>>>> work on register.php and newuser.php,
}
?>