<?php 
	session_start();
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
			<h2>Список производителей</h2>
			<ul>
				<?php $brands=get_brands(); ?>	
			<?php foreach ($brands as $brand): ?>
			<li>
				<table class="edit">
					<tr>
						<td><label class="description"><?= $brand['Наименование'] ?></label></td>
						<td><a  href="/edit.php?edit_brand=<?=$brand['id']?>"><img class="edit" src="images/edit.png"></a></td>
					</tr>
				</table>
			</li>
			<?php endforeach; ?>
			<li>
		<h2>Добавление</h2>
	</li>
		<form action="/forms/check_category.php" method="post">
			<li>
			<input type="text" class="form-control" name="brand_name" id="brand_name" placeholder="Введите название">
		</li>
		<li>
			<button class="form" type="submit">Добавить</button>
		</li>
		</form ><br>
		<form action="/forms/delete.php" method="post">
			<li>
					<h2>Удаление</h2>
				</li>
					<?php $brands=get_brands(); ?>
					<li>
					<select class="form" name="brand"> 
						<?php foreach ($brands as $brand): ?>
						<option value="<?= $brand['Наименование'] ?>" ><?= $brand['Наименование'] ?></option>

					<?php endforeach; ?>
					</select>
				</li>				
					<li><br><button class="form" type="submit">Удалить</button>

		</form>
		</section>
	</main>	
</body>
</html>