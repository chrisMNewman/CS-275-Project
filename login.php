

<html><head><script type="text/javascript" charset="utf-8" src="http://web.engr.oregonstate.edu/~fortnerm/CS-275-Project/sha1.js"></script></head><body>


<script type="text/javascript" charset="utf-8">
server_hash = hex_hmac_sha1($_POST['server_time'], query_hash);

}

</script>

<?php
	session_start(); 
	
	//TODO check password against hash in database


	//if($server_hash == $_POST['pwd_hash'])
	//{
	//	$_SESSION['username'] = $_POST['username']; 
	//}
	 print($_POST['username'].$_POST['password'].$_SESSION['username'].$_SESSION['pwd_hash'])
    //header( 'Location: '.$_POST['return_url'] ) ;
?>


</body></html>