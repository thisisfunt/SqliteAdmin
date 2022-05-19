<?php 

	include 'config.php';

	$pdo = new PDO('sqlite:'.DB_NAME);
	echo "inited";
 ?>