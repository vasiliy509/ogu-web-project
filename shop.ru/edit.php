<?php 
require_once "include/db.php";
require_once "include/function.php"; 
$id_category = $_GET['edit_category'];
$id_brand = $_GET['edit_brand'];
$id_country = $_GET['edit_country'];
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
		<?php if (isset($_GET['edit_category'])): ?>
		<section class="item">
		<h2>Редактирование категории <?php print_r(get_category_name($id_category)['title']) ?></h2>
		<form action="/forms/check_category.php" method="post">
			<input type="hidden" name="id_category" value="<?php echo $id_category ?>">
			<input type="text" class="form-control" name="edit_category" id="edit_category" placeholder="Введите название"><br><br>
			<button class="form" type="submit">Отправить</button>
		</form >
		</section>
	<?php endif ?>

	<?php if (isset($_GET['edit_brand'])): ?>
		<section class="item">
		<h2>Редактирование производителя <?php print_r(get_brand_name($id_brand)['Наименование']) ?></h2>
		<form action="/forms/check_category.php" method="post">
			<input type="hidden" name="id_brand" value="<?php echo $id_brand ?>">
			<input type="text" class="form-control" name="edit_brand" id="edit_brand" placeholder="Введите название"><br><br>
			<button class="form" type="submit">Отправить</button>
		</form >
		</section>
	<?php endif ?>

	<?php if (isset($_GET['edit_country'])): ?>
		<section class="item">
		<h2>Редактирование страны производства <?php print_r(get_country_name($id_country)['Наименование']) ?></h2>
		<form action="/forms/check_category.php" method="post">
			<input type="hidden" name="id_country" value="<?php echo $id_country ?>">
			<input type="text" class="form-control" name="edit_country" id="edit_country" placeholder="Введите название"><br><br>
			<button class="form" type="submit">Отправить</button>
		</form >
		</section>
	<?php endif ?>

	</main>	
</body>
</html>