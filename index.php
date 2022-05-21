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
		<h1 class="table_title">Tables:</h1>
		<table>
			<tr>
				<th>id</th>
				<th>name</th>
				<th>count</th>
			</tr>
		<?php 

			$pdo = new PDO('sqlite:'.DB_NAME);
			$statement = $pdo->query("SELECT * FROM sqlite_sequence;");
			$rows = $statement->fetchAll(PDO::FETCH_ASSOC);

			foreach ($rows as $key => $value) { ?>
				<?php 
					if ($value['name'] == 'Users' && USER_STATUS != 'admin') {
						continue;
					}
				?>
				<tr>
					<td><?php echo $key ?></td>
					<td><a href="<?php  echo ADMIN_REF_PREFIX ?>/table.php?name=<?php echo $value['name'] ?>"><?php echo $value['name'] ?></a></td>
					<td><?php echo $value['seq'] ?></td>
				</tr>
			<?php } ?>
		 </table>
	</div>
</body>
</html>