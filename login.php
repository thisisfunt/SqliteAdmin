<?php include 'config.php'; ?>
<?php 
	if (isset($_POST['name']) && isset($_POST['password'])){
		$pdo = new PDO('sqlite:'.DB_NAME);
		//$statement = $pdo->query("SELECT * FROM Users WHERE name='".$_POST['name']."' AND password='".$_POST['//']."';");
		$statement = $pdo->query("SELECT * FROM Users WHERE name='user' AND password='user';");
		$rows = $statement->fetchAll(PDO::FETCH_ASSOC);
		echo count($rows);
		if (count($rows) != 0) {
			setcookie("name", $_POST['name'], time() + 86400, "/");
			setcookie("password", $_POST['password'], time() + 86400, "/");
			header("location: ".ADMIN_REF_PREFIX);
			die();
		}
	}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="login_content">
		<form action="" class="login_form" method="POST">
			<input type="text" name="name" placeholder="name">
			<input type="text" name="password" placeholder="password">
			<input type="submit" value="submit" width="722px">
		</form>
	</div>
</body>
</html>