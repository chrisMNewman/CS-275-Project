<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
<title>Mike and Chris's Super Forum</title>
<link rel="stylesheet" type="text/css" href="mikechrisforum.css" />
</head>

<body>
<div id="wrap" >
	<?php include "header.php" ?>
	<br>
	<div id="page_body">
		<div id="thread_name"> 
			Forum Rules, please read before posting. Seriously, do it.
		</div>
		<table id="post_item_table">
			<tr id="post_item">
				<td id="table_header">User</td>
				<td id="table_header">Content</td>
				<td id="table_header">Post Time</td>
			</tr>
			<tr id="post_item">
				<td id="post_item_user"><a href="">Admin</a></td>
				<td id="post_item_content">Forum Rules:<br>1)don't be dick.<br>2)Do what the mods say.<br>3)see rules 1 and 2</td>
				<td id="post_item_date">5/26/2012 9:18pm</td>
			</tr>	
			<tr id="post_item">
				<td id="post_item_user"><a href="">fortnerm</a>
				<td id="post_item_content">Jeez, these rules need some real work.</td>
				<td id="post_item_date">5/27/2012 2:50pm</td>
			</tr>	
		</table>
		<br>
		<form id="newpost_form"action="newpost.php" method="post">
			New Post:<br> <textarea id="newpost_content" name="content" rows=6 cols=50></textarea>
			<br>
			<input id="newpost_submit" type="submit">
		</form>
	</div>
	<br>
	<?php include "footer.php" ?>
</div>
</body>
</html>
