<?php 
	session_start(); 
	require("common.php"); 
?>


<html>
<head>
	<title>Mike and Chris's Super Forum</title>
	<link rel="stylesheet" type="text/css" href="mikechrisforum.css" />
</head>
<body>
	<div id="wrap" >
	<?php include "header.php" ?> <br>

	<div id="page_body">

		<?php
		if(!isset($_SESSION['U_ID'])){
			print('Please login to post');
		}
		else { ?>
		<form id="newthread_form" action="newthread.php" method="post">
			<label for="newthread_title">Title</label> <br>
			<input id="newthread_title" type="text" name="title"><br>

			<label for="newthread_content">First Post:</label><br> 
			<textarea id="newthread_content" name="content" rows=6 cols=50></textarea>
			<br>
			<input id="newpost_submit" type="submit">
		</form>
		<?php } ?>
	</div>
	<br>
	<?php include "footer.php" ?> <br>
</div>
</body>
</html>