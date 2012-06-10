<?php
session_start(); 
require("common.php");

$username = $db->real_escape_string(trim($_POST['username']));
$password = $db->real_escape_string(trim($_POST['password_hash']));

if(empty($username) or empty($password)){
exit('<meta http-equiv="refresh" content="0; url=' . urldecode($homepage) . '"/>'); 
}

//return_url parsing
$return_url = $_POST['return_url'];
$url_arr = explode('?', $return_url);  //index 0 is the base url, index 1 is GET params
$return_url = $url_arr[0].'?';
if(count($url_arr) >= 2){
	$params = $url_arr[1];
	if(!empty($params)){
		$params = explode('&', $params);  //array of key=value pair params
		for($i = 0; $i < count($params); $i++){
			if(strcmp($params[$i],'login_error') != 0){
				$return_url .= ($params[$i].'&');
			}
		}		
	}
}

$query = 'SELECT U_ID, Password FROM User WHERE Screen_Name LIKE "'. $username.'"';
$result = $db->query($query);
if($result->num_rows != 1){
	$result->close();
	exit('<meta http-equiv="refresh" content="0; url=' . urldecode($return_url.'login_error') . '"/>');
}
while ($row = $result->fetch_assoc()){
	$stored_password = $row['Password'];
	$U_ID = $row['U_ID'];
}
$result->close();

if (strcmp($password, $stored_password) == 0){
	$_SESSION['username'] = $username; 
	$_SESSION['U_ID'] = $U_ID;
	exit('<meta http-equiv="refresh" content="0; url=' . urldecode($return_url) . '"/>'); 
}
else {
	exit('<meta http-equiv="refresh" content="0; url=' . urldecode($return_url.'login_error') . '"/>'); 
}
?>