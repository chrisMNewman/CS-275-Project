<script src="http://crypto-js.googlecode.com/svn/tags/3.0.2/build/rollups/sha256.js"></script>
<script src="http://crypto-js.googlecode.com/svn/tags/3.0.2/build/components/enc-base64-min.js"></script>
<script type="text/javascript" charset="utf-8" >
function validateLoginForm()
{
	var login = document.forms["login_form"];

	var name = login.elements["username"];
	var pwd = login.elements["password"];
	var salt = login.elements["server_salt"];
	var pwd_hash = login.elements["password_hash"];

	var hash = CryptoJS.SHA256(pwd.value + salt);

	pwd_hash.value = hash.toString(CryptoJS.enc.Hex);
	pwd.value = '';

	return true;
}
</script>


<div id="page_header" >
	<span id="links">
		<a href="<?php print($homepage.'index.php'); ?>"><img src="title_image.png"></a> 
	</span>


<span id="login">
<?php if (isset($_SESSION['username'])) {?>

<form action="logout.php" method="post">
	Welcome, <?php print($_SESSION['username'])?>! 
	<input type="hidden" name="return_url" value="<?php print(curPageURL())?>">
	<input type="submit" value="Logout">
</form>
<?php } 
	  else { ?>
		
			
		<form id="login_form" action="login.php" method="post" onsubmit="return validateLoginForm();">

			Welcome, Guest! Please Login
			<input type="text" id="login_name" name="username" value="Username" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;"> 
			<input type="password" id="login_password" name="password" value="Password" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;"> 
			<input type="hidden" name="return_url" value="<?php print(curPageURL());?>">
			<input type="hidden" name="server_salt" value="<?php print((string)$server_salt);?>">
			<input type="hidden" name="password_hash">
			<input type="submit" value="Login"> 
			or <a href="register.php">Register</a> to post.
		</form> 
		<?php if (isset($_GET['login_error'])) { print('<span id="login_errors">Incorrect username or password</span>');} ?>
	<?php } ?>
	</span>

	
</div>
