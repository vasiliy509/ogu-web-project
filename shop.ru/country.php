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
			<h2>Список стран производства</h2>
			<ul>
				<?php $countries=get_countries(); ?>	
			<?php foreach ($countries as $country): ?>
			<li>
				<table class="edit">
					<tr>
						<td><label class="description"><?= $country['Наименование'] ?></label></td>
						<td><a  href="/edit.php?edit_country=<?= $country['id']?>"><img class="edit" src="images/edit.png"></a></td>
					</tr>
				</table>
			</li>
			<?php endforeach; ?>
			<li>
		<h2>Добавление</h2>
	</li>
		<form action="/forms/check_category.php" method="post">
			<li>
			<input type="text" class="form-control" name="country_name" id="country_name" placeholder="Введите название">
		</li>
		<li>
			<button class="form" type="submit">Добавить</button>
		</li>
		</form ><br>
		<form action="/forms/delete.php" method="post">
			<li>
					<h2>Удаление</h2>
				</li>
					<?php $countries=get_countries(); ?>
					<li>
					<select class="form" name="country"> 
						<?php foreach ($countries as $country): ?>
						<option value="<?= $country['Наименование'] ?>" ><?= $country['Наименование'] ?></option>
					<?php endforeach; ?>
					</select>
				</li>				
					<li><br><button class="form" type="submit">Удалить</button>

		</form>
		</section>
	</main>	
</body>
</html>