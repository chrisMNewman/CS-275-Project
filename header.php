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
		
		<form id="login_form" action="login.php" method="post">
			Welcome, Guest! Please Login
			<input type="text" id="login_name" name="username" value="Username" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;"> 
			<input type="password" id="login_password" name="password" value="Password" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;"> 
			<input type="hidden" name="return_url" value="<?php print(curPageURL());?>">
			<input type="submit" value="Login"> 
			or <a href="register.php">Register</a> to post.
		</form> 
	<?php } ?>
	</span>

	
</div>
