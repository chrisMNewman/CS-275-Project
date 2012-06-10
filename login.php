<?php
	session_start(); 
	require("common.php");
	
	$username = $db->real_escape_string(trim($_POST['username']));
	$password = $db->real_escape_string(trim($_POST['password_hash']));

	$query = 'SELECT U_ID, Password FROM User WHERE Screen_Name LIKE "'. $username.'"';
	$result = $db->query($query);
	if($result->num_rows != 1){
		$result->close();
	exit('<meta http-equiv="refresh" content="0; url=' . urldecode($_POST['return_url'].'?login_error') . '"/>');
	}
	while ($row = $result->fetch_assoc()){
		$stored_password = $row['Password'];
		$U_ID = $row['U_ID'];
	}
	$result->close();

	if (strcmp($password, $stored_password) == 0){
		$_SESSION['username'] = $username; 
		$_SESSION['U_ID'] = $U_ID;
		exit('<meta http-equiv="refresh" content="0; url=' . urldecode($_POST['return_url']) . '"/>'); 
	}
	else {
		exit('<meta http-equiv="refresh" content="0; url=' . urldecode($_POST['return_url'].'?login_error') . '"/>'); 
	}
?>