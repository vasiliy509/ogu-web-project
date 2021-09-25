<?php 
	session_start();
	require_once "include/db.php";
	require_once "include/function.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Добавление товара</title>
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
				<h2>Добавление товара</h2>
			<form action="forms/check_post.php" method="post">
				<ul>
					<li>
						<label class="description">Наименование </label>
						<input type="text" class="form" name="title" placeholder="Введите название"><br>
					</li>		
				
					<li >
						<label class="description">Описание </label>
							<textarea class="form" name="description" id="textarea"> </textarea> 
					</li><br>		
					<li>
						<label class="description">Ссылка на фото товара </label>
							<input name="image" class="form" type="text" placeholder="Введите ссылку"> <br>
					</li>		
					<li>
						<label class="description">В наличии </label>
						<input name="available" class="form" type="text" placeholder="Введите количество"> <br>
					</li>		
					<li>
						<label class="description">Цена </label>
							<input name="price" class="form" type="text" placeholder="В рублях"><br>
					</li>
					<?php $brands=get_brands(); ?>	
					<label class="description">Производитель</label><br>
							<?php foreach ($brands as $brand): ?>	
					<li id="radio">
							
							<input name="brand" class="radio" type="radio" id="brand_name" value="<?= $brand['id'] ?>">
							<label ><?= $brand['Наименование'] ?></label>
					</li><?php endforeach; ?>	<br>
					<?php $countries=get_countries() ?>
					<li>
						<label class="description">Страна производства</label>
						<div>
						<select class="form" name="country"> 
							<option value="" selected="selected"></option>
							
							<?php foreach ($countries as $country): ?>
							<option value="<?= $country['id'] ?>" ><?= $country['Наименование'] ?></option>
							<?php endforeach; ?>
						</select>
						</div> <br>
					</li>	
					<li>
					<label class="description" >Категория</label>
					<?php $categories=get_categories(); ?>
					<select class="form" name="category"> 
						<option value="" selected="selected"></option>
						<?php foreach ($categories as $category): ?>
						<option value="<?= $category['id'] ?>" ><?= $category['title'] ?></option><?php endforeach; ?>
					</select>			
					</li><br>	
					<button class="form" type="submit">Добавить</button>
				</ul>
			</form>	
		</section>
	</main>
</body>
</html>