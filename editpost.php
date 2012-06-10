<?php
session_start(); 
require("common.php");

$content = $db->real_escape_string($_POST['content']);
$T_ID = $db->real_escape_string(trim($_POST['T_ID']));
$curpage = $db->real_escape_string(trim($_POST['curpage']));
$P_Number = $db->real_escape_string(trim($_POST['P_Number']));
$time = date('Y-m-d H:i:s');

$query = 'UPDATE Post Set Last_Edit_Time=\''.$time.'\', Content=\''.$content.'\' WHERE P_Number='.$P_Number;

$db->query($query);
if ($db->error){
	exit('<meta http-equiv="refresh" content="0; url=' . urldecode($homepage.'thread.php?T_ID='.$T_ID.'database_error='.$db->error) . '"/>'); 
}


exit('<meta http-equiv="refresh" content="0; url=' . urldecode($homepage.'thread.php?T_ID='.$T_ID.'&page='.$curpage) . '"/>'); 
?>