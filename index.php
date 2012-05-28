<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
<title>Mike and Chris's CS275 Forum</title>
<link rel="stylesheet" type="text/css" href="mikechrisforum.css" />
</head>

<body>

<div id="wrap" >
	<?php include "header.php" ?>
	<br>
	<div id="page_body">
		<div id="page_list">
			Goto Page:<a href="link">1</a>, <a href="link">2</a>, <a href="link">3</a>, ... , <a href="link">6</a>, <a href="link">7</a>, <a href="link">8</a>
		</div>
		<table id="thread_link_table">
			<tr id="thread_link">
				<td id="table_header">Thread Title</td>
				<td id="table_header">Post Count</td>
				<td id="table_header">Last Post</td>
			</tr>	
			<tr id="thread_link">
				<td id="thread_link_name"><a href="thread.php">Forum Rules, please read before posting. Seriously, do it.</a></td>
				<td id="thread_link_count">Posts: 2</td>
				<td id="thread_link_date">5/27/2012 2:50pm</td>
			</tr>	
			<tr id="thread_link">
				<td id="thread_link_name"><a href="link">General FAQ thread</a></td>
				<td id="thread_link_count">Posts: 7</td>
				<td id="thread_link_date">5/27/2012 10:11pm</td>
			</tr>	
			<tr id="thread_link">
				<td id="thread_link_name"><a href="link">CS275 Assignment deadline changes</a></td>
				<td id="thread_link_count">Posts: 12</td>
				<td id="thread_link_date">5/27/2012 12:33am</td>
			</tr>	
		</table>
		<div id="page_list">
			Goto Page:<a href="link">1</a>, <a href="link">2</a>, <a href="link">3</a>, ... , <a href="link">6</a>, <a href="link">7</a>, <a href="link">8</a>
		</div>
		<form id="newthread_form" action="newthread.php" method="get">
			<input type="submit" value="New Thread">

		</form>
	</div>
	<br>
	<?php include("footer.php");?>
</div>
</body>
</html>
