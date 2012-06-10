<?php
session_start(); 
header( 'Location: '.$_POST['return_url'] ) ;
session_destroy();
?>