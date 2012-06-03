
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start(); 
		require("common.php"); ?>


<html>

<head>
	<title>Mike and Chris's Super Forum</title>
	<link rel="stylesheet" type="text/css" href="mikechrisforum.css" />
</head>

<body><div id="wrap" >
	<div id="page_header" >
	<span id="links">
		<a href="<?php print($homepage); ?>"><img src="title_image.png"></a> 
  </span></div>

	<br>

	<div id="page_body">
	  Create new account:<br>

	  <form id="newuser_form" action="newuser.php" method="post">
	    <label for="newuser_name">Username</label>
	    <input type="text" name="username" id="newuser_name" /><br>

	    <label for="newuser_password">Password</label>
	    <input type="password" name="password" id="newuser_password" /><br>

	    <label for="newuser_password">Confirm Password</label>
	    <input type="password" name="passwrd_confirm" id="newuser_password" /><br>

	    <input type="submit" value="Submit">
	  </form>

  </div>
	<br>
	<?php include("footer.php"); ?>
</div></body>

</html>

