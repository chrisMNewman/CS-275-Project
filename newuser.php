<?php
session_start(); 
require("common.php");

$username = $db->real_escape_string(trim($_POST['username']));
$password = $db->real_escape_string(trim($_POST['password_hash']));

if(empty($username) or empty($password)){
	exit('<meta http-equiv="refresh" content="0; url=' . urldecode($homepage) . '"/>'); 
}

//check database for username

$query = 'SELECT Screen_Name FROM User WHERE Screen_Name LIKE "'. $username.'"';
if($result = $db->query($query)){
	if($result->num_rows > 0){
		$result->close();
		exit('<meta http-equiv="refresh" content="0; url=' . urldecode($homepage.'register.php?username_taken') . '"/>');
	}
	else{ //username is not taken so add new user to the User table and generate values
		$result->close();
		$query = 'INSERT INTO `User` VALUES (null,"'.$username.'","'.date('Y-m-d').'","'.$password.'")';
		$db->query($query);
		if ($db->affected_rows == 1){
			exit('<meta http-equiv="refresh" content="0; url=' . urldecode($homepage.'index.php?'.$db->error) . '"/>');
		}
		else{
			exit('<meta http-equiv="refresh" content="0; url=' . urldecode($homepage.'index.php?database_error') . '"/>');
		}
	}
}
else{
	exit('<meta http-equiv="refresh" content="0; url=' . urldecode($homepage.'index.php?database_error') . '"/>');
}
?>