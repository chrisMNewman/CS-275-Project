<script type="text/javascript" charset="utf-8" src=<?php print($homepage."sha1.js");?>></script>
<script type="text/javascript" charset="utf-8" >
function validateLogin()
{
form = document.forms["login_form"];
salt = form.elements["server_salt"];
time = form.elements["server_time"];
pwd = form.elements["password"];
hash = form.elements["pwd_hash"];

pwd.value = '';
var temp = str_hmac_sha1(salt.value, pwd.value);
hash.value = str_hmac_sha1(time.value, temp); 
alert(hash.value);
}
</script>


<div id="page_header" >
	<span id="links">
		<a href="<?php print($homepage); ?>"><img src="title_image.png"></a> 
	</span>


<span id="login">
<?php if (isset($_SESSION['username'])) {?>

<form action="logout.php" method="post">
	Welcome, <?php print($_SESSION['username'])?>! 
	<input type="hidden" name="return_url" value="<?php print(curPageURL())?>">
	<input type="submit" value="Logout">
</form>
<?php } 
	  else {  ?>
		
			
		<form id="login_form" action="login.php" method="post" 
		      onsubmit="validateLogin();">
			Welcome, Guest! Please Login
			<input type="text" id="login_name" name="username" value="Username" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;"> 
			<input type="password" id="login_password" name="password" value="Password" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;"> 
			<input type="hidden" name="return_url" value="<?php print(curPageURL());?>">
			<input type="hidden" name="server_salt" value="<?php print((string)$server_salt);?>">
			<input type="hidden" name="server_time" value="<?php print((string)time());?>">
			<input type="hidden" name="pwd_hash">
			<input type="submit" value="Login"> 
			or <a href="register.php">Register</a> to post.
		</form> 
	<?php } ?>
	</span>

	
</div>
