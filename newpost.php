<?php
session_start(); 
require("common.php");

$content = $db->real_escape_string(strip_tags($_POST['content'], $allowed_tags));
$T_ID = $db->real_escape_string(trim($_POST['T_ID']));
$U_ID = $_SESSION['U_ID'];
$time = date('Y-m-d H:i:s');

if(empty($T_ID) or empty($content)){
	exit('<meta http-equiv="refresh" content="0; url=' . urldecode($homepage) . '"/>'); 
}

$query = 'INSERT INTO Post(P_Number, T_ID, U_ID, Post_Time, Last_Edit_Time, Content) VALUES (null, '.$T_ID.', '.$U_ID.', \''.$time.'\', \''.$time.'\', \''.$content.'\');';
$db->query($query);
if ($db->error){
	exit('<meta http-equiv="refresh" content="0; url=' . urldecode($homepage.'index.php?database_error='.$db->error) . '"/>'); 
}

$per_page = $_SESSION['post_per_page'];

$query = 'SELECT COUNT(*) FROM Post WHERE T_ID='.$T_ID;
if($result = $db->query($query)){
	$row = $result->fetch_row();
	$pagecount = (int)(($row[0]+$per_page-1)/$per_page);
	if($pagecount == 0) {$pagecount = 1;}
}
else {
	$pagecount = 1;
}



exit('<meta http-equiv="refresh" content="0; url=' . urldecode($homepage.'thread.php?T_ID='.$T_ID.'&page='.$pagecount) . '"/>'); 
?>