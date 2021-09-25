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
			<?php 
				$category_id = $_GET['id'];
				$posts = get_posts_by_category_id($category_id); 
				$category = get_category_name($category_id);
			?>
		<div class="post">
			<h2><?= $category["title"] ?>:	</h2>
			<?php if ($user_role['role'] == 1): ?>						
			<?php if ($posts==NULL): ?>
				<div>
				<a  href="/forms/del_category.php?del=<?=$_GET['id']?>"> Удалить категорию </a>
				</div>
			<?php endif; ?>
			<?php endif; ?>
		</div>
			<?php foreach ($posts as $post): ?>
			<table>
			    <tr>
			        <td colspan="4">
			        	<h3 class="item"><a href="/post.php?post_id=<?=$post['id']?>"><?=$post['Наименование'] ?></a></h3>
			        </td>
			    </tr>
			    <tr>
			        <td><div class="img"><img src="<?=$post['Картинка'] ?>"></div></td>
			        <td colspan="3">
			        	<p class="item">
			        		<?=mb_substr($post['Описание'], 0, 128, 'UTF-8').' ...'?></p>
			        	<p class="item"><a href="/post.php?post_id=<?=$post['id']?>">Читать полностью</a></p>

			        </td>
			    </tr>
			</table>
			<br><br>
		<?php endforeach; ?>
		</section>
	</main>	
	
</body>
</html>
