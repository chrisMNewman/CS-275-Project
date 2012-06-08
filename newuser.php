<?php
session_start(); 
require("common.php");

$username = $db->real_escape_string(trim($_POST['username']));
$password = $db->real_escape_string(trim($_POST['password']));
$password_confirm = $db->real_escape_string(trim($_POST['password_confirm']));

if(empty($username) or empty($password) or empty($password_confirm)){
	//empty field(s), return error message
	exit('<meta http-equiv="refresh" content="0; url=' . urldecode($homepage.'register.php?empty_field_error').'"/>'); 
}
else{ //no empty fields, attempt to validate form
	if ((strlen($username) < 4) or (strlen($username) > 32)){
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

		$query = 'SELECT Screen_Name FROM User WHERE Screen_Name LIKE "'. $username.'"';
		$result = $db->query($query);
	    if($result->num_rows > 0){
	    	exit('<meta http-equiv="refresh" content="0; url=' . urldecode($homepage.'register.php?username_taken') . '"/>');
	    }
	    else{ //username is not taken so add new user to the User table and generate values
	    	$query = 'INSERT INTO `User` VALUES (null,"'.$username.'","'.date('Y-m-d').'","'.$password.'")';
			$result = $db->query($query);
			if (true){//$db->affected_rows() == 1){
				exit('<meta http-equiv="refresh" content="0; url=' . urldecode($homepage.'index.php?'.$db->error) . '"/>');
			}
			else{
				exit('<meta http-equiv="refresh" content="0; url=' . urldecode($homepage.'register.php?database_error') . '"/>');
			}
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
}
?>