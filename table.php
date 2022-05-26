<?php include 'config.php'; ?>
<?php include 'res/templates/is_auth.php'; ?>

<?php 
	if (!isset($_GET['name'])){
		header('location: '.ADMIN_REF_PREFIX);
		die();
	}
	$pdo = new PDO('sqlite:'.DB_NAME);
	$statement = $pdo->query("SELECT * FROM ".$_GET['name']);
	$rows = $statement->fetchAll(PDO::FETCH_ASSOC);
	if (count($rows) == 0) {
		header("location: ".ADMIN_REF_PREFIX);
		die();
	}

	if (isset($_POST['table_name'])) {
		$table_name = $_POST['table_name'];
		$param_list = array_slice($_POST, 1);
		$db_request = 'INSERT INTO '.$table_name.' VALUES (NULL, ';
		foreach ($param_list as $key => $value) {
			$db_request .= '"'.$value.'", ';
		}
		$db_request = substr($db_request,0,-2);
		$db_request .= ');';
		$pdo->exec($db_request);
		header("location: ".ADMIN_REF_PREFIX."/table.php?name=".$table_name);
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
		<table>
			<?php 
				

				foreach ($rows[0] as $key => $value) { ?>
					<th><?php echo $key ?></th>
				<?php } 
				foreach ($rows as $nrow => $row) { ?>
					<tr>
						<?php foreach ($row as $key => $value) { 
							if ($key == 'id') { ?>
								<td><a href="<?php echo ADMIN_REF_PREFIX.'/edit.php?name='.$_GET['name'].'&id='.$value ?>">
									<?php echo $value ?>
								</td></a>
							<?php } else { ?>
								<td><?php echo $value ?></td>
							<?php } ?>
						<?php } ?>
					</tr>
				<?php } ?>
		 </table>

		 <form action="" method="POST" class="insert_form">
		 	<input type="text" name="table_name" hidden="true" value="<?php echo $_GET['name'] ?>">
				<?php 
					foreach ($rows[0] as $key => $value) { 
						if ($key != 'id') { ?>
							<textarea name="<?php echo $key ?>" placeholder="<?php echo $key ?>"></textarea>
						<?php }
					} ?>
			<input type="submit" value="insert">
		</form>
	</div>
</body>