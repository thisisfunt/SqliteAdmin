<?php 

	include 'config.php';
	include 'is_auth.php';

	setcookie('name', null, -1, '/'); 
	setcookie('password', null, -1, '/'); 
	header("location: ".SITE_REF_PREFIX)

 ?>