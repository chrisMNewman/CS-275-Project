<?php
session_start(); 
require("common.php");

$title = $db->real_escape_string(trim($_POST['title']));
$content = $db->real_escape_string($_POST['content']);
$U_ID = $_SESSION['U_ID'];
$time = date('Y-m-d H:i:s');

if(empty($title) or empty($content)){
	exit('<meta http-equiv="refresh" content="0; url=' . urldecode($homepage) . '"/>'); 
}

//insert into thread table
$query = 'INSERT INTO Thread(T_ID, U_ID, Creation_Time, Title) VALUES (null, '.$U_ID.', \''.$time.'\', \''.$title.'\');';
$db->query($query);
if ($db->error){
	exit('<meta http-equiv="refresh" content="0; url=' . urldecode($homepage.'index.php?database_error='.$db->error) . '"/>'); 
}
$T_ID = $db->insert_id;


//create first post and insert
$query = 'INSERT INTO Post(P_Number, T_ID, U_ID, Post_Time, Last_Edit_Time, Content) VALUES (null, '.$T_ID.', '.$U_ID.', \''.$time.'\', \''.$time.'\', \''.$content.'\');';
$db->query($query);
if ($db->error){
	exit('<meta http-equiv="refresh" content="0; url=' . urldecode($homepage.'index.php?database_error='.$db->error) . '"/>'); 
}

exit('<meta http-equiv="refresh" content="0; url=' . urldecode($homepage.'thread.php?T_ID='.$T_ID) . '"/>'); 
?>