<?php
session_start(); 
require("common.php");

$T_ID = $db->real_escape_string(trim($_POST['T_ID']));

if(empty($T_ID)){
	exit('<meta http-equiv="refresh" content="0; url=' . urldecode($homepage) . '"/>'); 
}

$query = 'DELETE FROM Post WHERE T_ID='.$T_ID;
$db->query($query);
if ($db->error){
	exit('<meta http-equiv="refresh" content="0; url=' . urldecode($homepage.'index.php?database_error='.$db->error) . '"/>'); 
}

$query = 'DELETE FROM Thread WHERE T_ID='.$T_ID;
$db->query($query);
if ($db->error){
	exit('<meta http-equiv="refresh" content="0; url=' . urldecode($homepage.'index.php?database_error='.$db->error) . '"/>'); 
}

exit('<meta http-equiv="refresh" content="0; url=' . urldecode($homepage) . '"/>'); 
?>