<?php
session_start(); 
require("common.php");

$P_Number = $db->real_escape_string(trim($_POST['P_Number']));
$T_ID = $db->real_escape_string(trim($_POST['T_ID']));
$curpage = $db->real_escape_string(trim($_POST['curpage']));

$query = 'DELETE FROM Post WHERE P_Number='.$P_Number;
$db->query($query);
if ($db->error){
	exit('<meta http-equiv="refresh" content="0; url=' . urldecode($homepage.'thread.php?T_ID='.$T_ID.'&page='.$curpage.'database_error='.$db->error) . '"/>'); 
}

exit('<meta http-equiv="refresh" content="0; url=' . urldecode($homepage.'thread.php?T_ID='.$T_ID.'&page='.$curpage) . '"/>'); 
?>