<?php 
session_start(); 
require("common.php"); 
?>

<script type="text/javascript"> 
function validateNewthreadForm()
{
	var newthread = document.forms["newthread_form"];

	var title = newthread.elements["title"].value;
	var content = newthread.elements["content"].value;

	var title_error = false;
	var content_error = false;

	if ((title.length < 4) || (title.length > 40)){
		title_error = true;
	}

	if ((content.length < 1) || (content.length > 500)){
		content_error = true;
	}

	if (title_error || content_error){
		//form invalid, return error messages
		var error_message = 'Oops:\n';
		if (title_error){
			error_message = error_message + 'Title must be between 4 and 40 characters\n';
		}
		if (content_error){
			error_message = error_message + 'Post must be nonempty and at most 500 characters\n';
		}
		alert(error_message);
	    return false; 
 	}
	else{
		return true;
	}
}
</script>

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
		<form id="newthread_form" action="newthread.php" method="post" onsubmit="return validateNewthreadForm();">
			<label for="newthread_title">Title</label> <br>
			<input id="newthread_title" type="text" name="title"><br>

			<label for="newthread_content">First Post:</label><br> 
			<textarea id="newthread_content" name="content" rows=5 cols=100></textarea>
			<br>
			<input id="newpost_submit" type="submit" name="Post">
		</form>
		<?php } ?>
	</div>
	<br>
	<?php include "footer.php" ?> <br>
</div>
</body>
</html>