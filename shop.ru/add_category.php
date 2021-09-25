<?php require_once "include/db.php" ?><!--  -->
<?php require_once "include/function.php"; ?>

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
		<h2>Добавление категории</h2>
		<form action="/forms/check_category.php" method="post">
			<input type="text" class="form-control" name="category_name" id="category_name" placeholder="Введите название"><br><br>
			<button class="form" type="submit">Добавить категорию</button>
		</form >
		</section>
	</main>	
</body>
</html>