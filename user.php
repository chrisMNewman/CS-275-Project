<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start(); 
require("common.php"); 
if (!empty($_GET['U_ID'])) {$U_ID = $_GET['U_ID'];}
else {exit('<meta http-equiv="refresh" content="0; url=' . urldecode($homepage) . '"/>');}
?>

<html>
<head>
<title>Mike and Chris's Super Forum</title>
<link rel="stylesheet" type="text/css" href="mikechrisforum.css" />
</head>

<script type="text/javascript" charset="utf-8" >
function validatePasswordChangeForm()
{
	var pwdchange = document.forms["password_change_form"];

	var old_pwd = pwdchange.elements["old_password"];
	var pwd = pwdchange.elements["password"];
	var conf = pwdchange.elements["password_confirm"];
	var salt = pwdchange.elements["server_salt"];
	var old_pwd_hash = pwdchange.elements["old_password_hash"];
	var pwd_hash = pwdchange.elements["password_hash"];

	var password = pwd.value;
	var confirm = conf.value;

	var password_length_error = false;
	var password_match_error = false;

	if ((password.length < 8) || (password.length> 32)){
		password_length_error = true;
	}

	if (password.localeCompare(confirm) != 0){
		password_match_error = true;
	}

	if (password_length_error || password_match_error){
		//form invalid, return error messages
		var error_message = 'Oops:\n';
		if (password_length_error){
			error_message = error_message + 'Password must be between 8 and 32 characters\n';
		}
		if (password_match_error){
			error_message = error_message + 'Passwords must match';
		}
		alert(error_message);
	    return false; 
 	}

 	var old_hash = CryptoJS.SHA256(old_pwd.value + salt.value);
	old_pwd_hash.value = old_hash.toString(CryptoJS.enc.Hex);

	var hash = CryptoJS.SHA256(pwd.value + salt.value);
	pwd_hash.value = hash.toString(CryptoJS.enc.Hex);

	pwd.value = '';
	conf.value = '';

	return true;
}
</script>

<body>
<div id="wrap" >
	<?php include "header.php" ?>
	<br>

	<?php
		$query = 'SELECT Screen_Name, Join_Date, COUNT(*), MAX(Post.Last_Edit_Time) FROM User NATURAL JOIN Post WHERE U_ID ='.$U_ID.' GROUP BY U_ID';
			if($result = $db->query($query)){
				$row = $result->fetch_row();
				$name = $row[0];
				$joindate = $row[1];
				$postcount = $row[2];
				$lastedit = $row[3];
				$result->close();
			}
			else{
				$name = "Database Error, please contact administrator.";
			}
	?>
	
    <div id="page_body">
		<div id="user_info">
			<p>Username: <?php print($name)?></p>
			<p>Join Date: <?php print($joindate)?></p>
			<p>Post Count: <?php print($postcount)?></p>
			<p>Last Activity at: <?php print($lastedit)?></p>
		</div>
		<?php if($U_ID == $_SESSION['U_ID']){ ?>

		<form id="password_change_form" action="changepassword.php" method="post" onsubmit="return validatePasswordChangeForm();">
			<?php if (isset($_GET['password_error'])) { print('<span id="login_errors">Incorrect password</span><br>');} ?>
			<label for="old_password">Old Password</label>
			<input id="old_password" type="password" name="old_password"><br>

			<label for="password">New Password</label>
			<input id="password" type="password" name="password"><br>

			<label for="password_confirm">Confirm New Password</label>
			<input id="password_confirm" type="password" name="password_confirm"><br>

			<input type="hidden" name="server_salt" value="<?php print($server_salt);?>">
			<input type="hidden" name="old_password_hash">
			<input type="hidden" name="password_hash">
			<input type="submit" value="Change password">
		</form>

		<?php } ?>
	</div>
		
</div>
<br>
<?php include("footer.php");?>
</div>
</body>
</html>
