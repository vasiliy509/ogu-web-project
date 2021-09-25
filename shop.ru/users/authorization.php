<?php 
	require_once "include/db.php";
	require_once "include/function.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Сайт</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">	
</head>
<body>
	<header class="container">
		<?php include "header.php" ?>
	</header>
			
	<main class="container">
		<nav class="item">	
		<?php include "leftblock.php" ?>
		</nav>
		<section class="item">
		<h1>Авторизация</h1>
		<form action="auth.php" method="post">
			<input type="text" class="form-control" name="last_name" id="last_name" placeholder="Введите фамилию"><br>
			<input type="password" class="form-control" name="password" id="password" placeholder="Введите пароль"><br>
		<button class="btn btn-success" type="submit">Войти</button>
	</form >
	</section>
	</main>	
	
</body>
</html>