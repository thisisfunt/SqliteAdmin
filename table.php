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
			<tr>
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
							<?php foreach ($row as $key => $value) { ?>
								<td><?php echo $value ?></td>
							<?php } ?>
						</tr>
					<?php } ?>
			</tr>
		 </table>
	</div>
</body>