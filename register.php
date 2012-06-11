<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
session_start(); 
require("common.php"); 

if(!empty($_SESSION['U_ID'])){
	exit('<meta http-equiv="refresh" content="0; url=' . urldecode($homepage) . '"/>'); 
}
?>

<html>

<head>
	<title>Mike and Chris's Super Forum</title>
	<link rel="stylesheet" type="text/css" href="mikechrisforum.css" />
	<script src="http://crypto-js.googlecode.com/svn/tags/3.0.2/build/rollups/sha256.js"></script>
	<script src="http://crypto-js.googlecode.com/svn/tags/3.0.2/build/components/enc-base64-min.js"></script>
	<script type="text/javascript"> 
function validateNewuserForm()
{
	var newuser = document.forms["newuser_form"];

	var name = newuser.elements["username"];
	var pwd = newuser.elements["password"];
	var conf = newuser.elements["password_confirm"];
	var salt = newuser.elements["server_salt"];
	var pwd_hash = newuser.elements["password_hash"];

	name.value = name.value.trim();
	var username = name.value;
	var password = pwd.value;
	var confirm = conf.value;

	var username_length_error = false;
	var password_length_error = false;
	var password_match_error = false;

	if ((username.length < 4) || (username.length > 32)){
		username_length_error = true;
	}

	if ((password.length < 8) || (password.length> 32)){
		var password_length_error = true;
	}
	else var password_length_error = false;

	if (password.localeCompare(confirm) != 0){
		var password_match_error = true;
	}
	else var password_match_error = false;
	if (username_length_error || password_length_error || password_match_error){
		//form invalid, return error messages
		var error_message = 'Oops:\n';
		if (username_length_error){
			error_message = error_message + 'Username must be between 4 and 32 characters\n';
		}
		if (password_length_error){
			error_message = error_message + 'Password must be between 8 and 32 characters\n';
		}
		if (password_match_error){
			error_message = error_message + 'Passwords must match';
		}
		alert(error_message);
	    return false; 
 	}
	else{
		var hash = CryptoJS.SHA256(password + salt.value);
		pwd_hash.value = hash.toString(CryptoJS.enc.Hex);

		pwd.value = '';
		conf.value = '';
		return true;
	}
}
</script>
</head>

<body><div id="wrap" >
	<?php include('header.php'); ?>
	<br>

	<div id="page_body">

		
		<?php if (isset($_GET['username_taken'])) {
				print('<div id="register_errors">Sorry, that username is already in use.</div>');} ?>

	  Create new account:<br>
	  WARNING!  Do NOT consider this website secure, choose a password you won't use elsewhere.
	  <form id="newuser_form" action="newuser.php" method="post" onsubmit="return validateNewuserForm();">
	  	
	    <label for="newuser_name">Username</label>
	    <input type="text" name="username" id="newuser_name" value="<?php print($_GET['username']);?>"/><br>
	    
	    <label for="newuser_password">Password</label>
	    <input type="password" name="password" id="newuser_password" /><br>
	    
	    <label for="newuser_confirm_password">Confirm Password</label>
	    <input type="password" name="password_confirm" id="newuser_confirm_password" /><br>

		<input type="hidden" name="password_hash"/>
		<input type="hidden" name="server_salt" value="<?php print($server_salt);?>"/>
	    <input type="submit" value="Register"/>
	  </form>

  </div>
	<br>
	<?php include("footer.php"); ?>
</div></body>

</html>

