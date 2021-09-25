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
			<h2>Ваши товары:</h2>

			<?php 
			$user = get_user_last_name($auth_session['last_name']);	
			$basket_posts = get_basket_user($user['id']); 
			?>
			<?php foreach ($basket_posts as $basket_post): ?>
				<?php if ($basket_post['количество товара']!=0): ?>
					      <?php 
					      	$post = get_post_by_id($basket_post['id_товара']);
					      ?>
					<table >
				<tr>
				   	<td colspan="4">
				        <h3 class="item"><a href="/post.php?post_id=<?=$post['id']?>"><?=$post['Наименование'] ?></a></h3><div>Кол-во: <?= $basket_post['количество товара']?></div><div>Цена всего: <?= $post['Цена']*$basket_post['количество товара'] ?></div>
				    </td>
				</tr>
				<tr>
				    <td>
				    	<div class="img"><img src="<?=$post['Картинка'] ?>"></div>		        	
				    </td>
				    <td colspan="3">
				       	<p class="item"><?=mb_substr($post['Описание'], 0, 128, 'UTF-8').' ...'?></p>
				        <p class="item"><a href="/post.php?post_id=<?=$post['id']?>">Читать полностью</a></p>
				    </td>
				</tr>			  
			</table>
					<br><br>
				<?php 
					endif; 
					$summa += $post['Цена']*$basket_post['количество товара'];
				?>
			<?php endforeach ?>
			Итоговая сумма: <?= $summa ?>
		</section>
	</main>	
	
</body>
</html>