
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
		
<<<<<<< HEAD
			
				
				
			 ?>
		
	  Create new account:<br>

	  <form id="newuser_form" action="newuser.php" method="post">
	  	<?php 
				if (isset($_GET['username_length'])) {
					print('<div id="register_errors">Username must be between 4 and 30 characters</div>');} ?>
	    <label for="newuser_name">Username</label>
	    <input type="text" name="username" id="newuser_name" /><br>
	    <?php if (isset($_GET['password_length'])) {
					print('<div id="register_errors">Password must be between 8 and 32 characters</div>');} ?>

	    <label for="newuser_password">Password</label>
	    <input type="password" name="password" id="newuser_password" /><br>
	    <?php if (isset($_GET['password_match'])) {
					print('<div id="register_errors">Passwords did not match</div>');}?>
	    <label for="newuser_confirm_password">Confirm Password</label>
	    <input type="password" name="passwrd_confirm" id="newuser_confirm_password" /><br>
=======
		<?php if (isset($_GET['empty_field_error'])) {
				print('<div id="register_errors">All fields are required</div>');} ?>

	  Create new account:<br>

	  <form id="newuser_form" action="newuser.php" method="post">
	  	
	    <label for="newuser_name">Username</label>
	    <input type="text" name="username" id="newuser_name" value="<?php print($_GET['username']);?>"/>
	    <?php if (isset($_GET['username_length_error'])) {
				print('<span id="register_errors">Username must be between 4 and 30 characters</span>');} ?><br>
	    

	    <label for="newuser_password">Password</label>
	    <input type="password" name="password" id="newuser_password" />
	    <?php if (isset($_GET['password_length_error'])) {
				print('<span id="register_errors">Password must be between 8 and 32 characters</span>');} ?><br>
	    
	    <label for="newuser_confirm_password">Confirm Password</label>
	    <input type="password" name="password_confirm" id="newuser_confirm_password" />
	    <?php if (isset($_GET['password_match_error'])) {
				print('<span id="register_errors">Passwords must match</span>');}?><br>
>>>>>>> work on register.php and newuser.php,

	    <input type="submit" value="Submit">
	  </form>

  </div>
	<br>
	<?php include("footer.php"); ?>
</div></body>

</html>

