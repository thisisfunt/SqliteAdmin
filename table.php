<?php include 'config.php'; ?>
<?php include 'res/templates/is_auth.php'; ?>
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
				if (!isset($_GET['name'])){
					header('location: '.ADMIN_REF_PREFIX);
					die();
				}
				$pdo = new PDO('sqlite:'.DB_NAME);
				$statement = $pdo->query("SELECT * FROM ".$_GET['name']);
				$rows = $statement->fetchAll(PDO::FETCH_ASSOC);
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
					<?php 
						foreach ($rows[0] as $key => $value) { 
							if ($key != 'id') { ?>
								<textarea name="<?php echo $key ?>" placeholder="<?php echo $key ?>"></textarea>
						<?php }
						} ?>
					<input type="submit" value="edit">
				</form>
	</div>
</body>