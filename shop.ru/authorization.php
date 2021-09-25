<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Авторизация</title>
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
		<h2>Авторизация</h2>
		<form action="auth.php" method="post">
			<input type="text" class="form" name="last_name" id="last_name" placeholder="Введите фамилию"><br>
			<input type="password" class="form" name="password" id="password" placeholder="Введите пароль"><br>
			<button class="form" type="submit">Войти</button>
		</form >
	</section>
	</main>	
</body>
</html>