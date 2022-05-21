<?php 
	
	include 'config.php';


	$pdo = new PDO('sqlite:'.DB_NAME);
	$pdo->query('CREATE TABLE "Users" ("id"	INTEGER NOT NULL UNIQUE,"name"	TEXT,"password"	INTEGER,"status"	TEXT,PRIMARY KEY("id" AUTOINCREMENT));');
	$pdo->query("INSERT INTO Users (name, password, status) VALUES ('".ADMIN_NAME."', '".ADMIN_PASSWORD."', 'admin')");
	echo "inited";
 ?>