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
		<h1 class="user_name">Name: <?php echo USER_NAME ?></h1>
		<p class="user_status">Status: <?php echo USER_PASSWORD ?></p>
		<a href="<?php echo ADMIN_REF_PREFIX.'/logout.php' ?>" class="logout_ref">logout</a>
	</div>
</body>
</html>