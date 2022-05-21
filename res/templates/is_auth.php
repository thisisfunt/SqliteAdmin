<?php 
	if(isset($_COOKIE["name"]) && isset($_COOKIE["password"])) {

		$pdo = new PDO('sqlite:'.DB_NAME);
		$statement = $pdo->query("SELECT * FROM Users WHERE name='".$_COOKIE['name']."' AND password='".$_COOKIE['password']."';");
		$rows = $statement->fetchAll(PDO::FETCH_ASSOC);
		if (count($rows) != 0) {
			define('USER_NAME', $rows[0]['name']);
			define('USER_PASSWORD', $rows[0]['password']);
			define('USER_STATUS', $rows[0]['status']);
		} else {
			header("location: ".ADMIN_REF_PREFIX."/login.php");
			die();
		}
	} else {
		header("location: ".ADMIN_REF_PREFIX."/login.php");
		die();
	}
 ?>