<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start(); 
require("common.php"); 
if (!empty($_GET['U_ID'])) {$U_ID = $_GET['U_ID'];}
?>

<html>
<head>
<title>Mike and Chris's Super Forum</title>
<link rel="stylesheet" type="text/css" href="mikechrisforum.css" />
</head>

<body>

<div id="wrap" >
	<?php include "header.php" ?>
	<br>

	<?php
		$query = 'SELECT Screen_Name, Join_Date, U_ID FROM User WHERE U_ID ='.$U_ID;
			if($result = $db->query($query)){
				$row = $result->fetch_row();
				$title = $row[0];
				$joindate = $row[1];
				$result->close();
			}
			else{
				$title = "Database Error, please contact administrator.";
				$owner = 'None';
			}
?>
	
    <div id="page_body">
		<div id="page_list">
		  <font size="5">
          <p>Username: <?php print($title)?></p>
		  <p>Join Date: <?php print($joindate)?></p>
          </font>
		</div>
		<form id="newthread_form" action="createthread.php" method="get">
		</form>
	</div>
	<br>
	<?php include("footer.php");?>
</div>
</body>
</html>
