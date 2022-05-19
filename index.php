<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="sidebar">
		<div class="sidebar_line">
			<div class="sidebar_item">
				<a href="<?php echo ADMIN_REF_PREFIX ?>">
					<img src="res/svg/table.svg" alt="">
					<h3 class="text">Tables</h3>
				</a>
			</div>
			<div class="sidebar_item">
				<a href="<?php echo ADMIN_REF_PREFIX ?>/profile">
					<img src="res/svg/user.svg" alt="">
					<h3 class="text">Profile</h3>
				</a>
			</div>
			<div class="sidebar_item">
				<a href="<?php echo SITE_REF_PREFIX ?>">
					<img src="res/svg/page.svg" alt="">
					<h3 class="text">Site</h3>
				</a>
			</div>
		</div>
	</div>
	<div class="content">
		<h1 class="table_title">Tables:</h1>
		<table>
			<tr>
				<th>id</th>
				<th>name</th>
			</tr>
		<?php 

			$pdo = new PDO('sqlite:'.DB_NAME);
			$statement = $pdo->query("SELECT * FROM sqlite_sequence;");
			$rows = $statement->fetchAll(PDO::FETCH_ASSOC);

			foreach ($rows as $key => $value) { ?>
				<tr>
					<td><?php echo $key ?></td>
					<td><a href="/table.php?name=<?php echo $value['name'] ?>"><?php echo $value['name'] ?></a></td>
				</tr>
			<?php } ?>
		 </table>
	</div>
</body>
</html>