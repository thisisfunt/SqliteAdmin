<?php include 'config.php'; ?>
<?php include 'res/templates/is_auth.php'; ?>

<?php 
	if (isset($_POST['table_name']) && isset($_POST['id'])) {
		$table_name = $_POST['table_name'];
		$item_id = $_POST['id'];
		$param_list = array_slice($_POST, 2);
		$db_request = "UPDATE ".$table_name." SET ";
		foreach ($param_list as $key => $value) {
			$db_request .= $key."='".$value."', ";
		}
		$db_request = substr($db_request,0,-2);
		$db_request .= " WHERE id=".$item_id;
		$pdo = new PDO('sqlite:'.DB_NAME);
		echo $db_request;
		$pdo->exec($db_request);
		header("location: ".ADMIN_REF_PREFIX."/table.php?name=".$table_name);
		die();
	}

	if (isset($_GET['name']) && isset($_GET['id'])){
		if (USER_STATUS != 'admin' && $_GET['name'] == 'Users') {
			header("location: ".ADMIN_REF_PREFIX);
			die();
		}
	} else {
		header("location: ".ADMIN_REF_PREFIX);
			die();
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
	<?php include 'res/templates/sidebar.php'; ?>
	<div class="content">
		<form action="" method="POST" class="edit_form">
			<input type="text" value="<?php echo $_GET['name'] ?>" hidden="true" name="table_name">
			<input type="text" value="<?php echo $_GET['id'] ?>" hidden="true" name="id">
			<?php 

				$pdo = new PDO('sqlite:'.DB_NAME);
				$statement = $pdo->query("SELECT * FROM ".$_GET['name']." WHERE id=".$_GET["id"]);
				$rows = $statement->fetchAll(PDO::FETCH_ASSOC);
				foreach ($rows[0] as $key => $value) { 
					if ($key != "id") { 
			?>			
						<div class="line">
							<label><?php echo $key ?></label>
							<textarea type="text" name="<?php echo $key; ?>"><?php echo $value ?></textarea>
						</div>
			<?php
				 	}
				}
			?>
			<input type="submit" value="insert">
		</form>
	</div>
</body>
</html>