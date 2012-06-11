<?php
session_start(); 
require("common.php");

$pwd = $db->real_escape_string($_POST['password_hash']);
$old_pwd = $db->real_escape_string($_POST['old_password_hash']);
$U_ID = $_SESSION['U_ID'];

if(empty($pwd) or empty($old_pwd) or empty($U_ID)){
	exit('<meta http-equiv="refresh" content="0; url=' . urldecode($homepage.'index.php?empty') . '"/>'); 
}

$query = 'SELECT Password FROM User WHERE U_ID='.$U_ID;
if($result = $db->query($query)){
	if($result->num_rows == 0){
		exit('<meta http-equiv="refresh" content="0; url=' . urldecode($homepage.'index.php?num_rows') . '"/>'); 
	}
	else{
		$row = $result->fetch_row();
		$stored_pwd = $row[0];
	}
	$result->close();
}

if(strcmp($stored_pwd, $old_pwd) != 0){
	exit('<meta http-equiv="refresh" content="0; url=' . urldecode($homepage.'user.php?U_ID='.$U_ID.'&password_error') . '"/>'); 
}

$query = 'UPDATE User Set Password=\''.$pwd.'\' WHERE U_ID='.$U_ID;
$db->query($query);
if ($db->error){
	exit('<meta http-equiv="refresh" content="0; url=' . urldecode($homepage.'index.php?database_error='.$db->error) . '"/>'); 
}


exit('<meta http-equiv="refresh" content="0; url=' . urldecode($homepage.'user.php?U_ID='.$U_ID) . '"/>'); 
?>