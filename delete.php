<?php

	include 'config.php';

	if (isset($_POST['table_name']) && isset($_POST['id'])) {
		$table_name = $_POST['table_name'];
		$item_id = $_POST['id'];
		$pdo = new PDO('sqlite:'.DB_NAME);
		$pdo->exec("DELETE FROM ".$table_name." WHERE id=".$item_id);
		header("location: ".ADMIN_REF_PREFIX."/table.php?name=".$table_name);
		die();
	}

	header('location: '.ADMIN_REF_PREFIX);
	die();
 ?>