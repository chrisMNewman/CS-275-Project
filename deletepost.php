<?php
session_start(); 
require("common.php");

$P_Number = $db->real_escape_string(trim($_POST['P_Number']));
$T_ID = $db->real_escape_string(trim($_POST['T_ID']));
$curpage = $db->real_escape_string(trim($_POST['curpage']));

if(empty($P_Number) or empty($T_ID) or empty($curpage)){
	exit('<meta http-equiv="refresh" content="0; url=' . urldecode($homepage) . '"/>'); 
}

//delete the specified post
$query = 'DELETE FROM Post WHERE P_Number='.$P_Number;
$db->query($query);
if ($db->error){
	exit('<meta http-equiv="refresh" content="0; url=' . urldecode($homepage.'index.php?database_error='.$db->error) . '"/>'); 
}

//delete thread if the last post is deleted
$query = 'SELECT COUNT(*) FROM Post WHERE T_ID='.$T_ID;
if($result = $db->query($query)){
	$row = $result->fetch_row();
	$count = $row[0];
	$result->close();
}

if($count == 0){
	$query = 'DELETE FROM Thread WHERE T_ID='.$T_ID;
	$db->query($query);
	if ($db->error){
		exit('<meta http-equiv="refresh" content="0; url=' . urldecode($homepage.'index.php?database_error='.$db->error) . '"/>'); 
	}
	exit('<meta http-equiv="refresh" content="0; url=' . urldecode($homepage.'index.php') . '"/>'); 
}


exit('<meta http-equiv="refresh" content="0; url=' . urldecode($homepage.'thread.php?T_ID='.$T_ID.'&page='.$curpage) . '"/>'); 
?>