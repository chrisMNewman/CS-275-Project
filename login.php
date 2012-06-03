<?php
	session_start(); 
	$_SESSION['username'] = $_POST['username'];  
	//TODO check password against hash in database

    header( 'Location: '.$_POST['return_url'] ) ;
?>
