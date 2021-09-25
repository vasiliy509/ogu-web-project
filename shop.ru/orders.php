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
			<h2>Заказы пользователей:</h2>
			<?php $users=get_users()?>
					
			<ul>
				<?php foreach ($users as $user): ?>
				<li>
					<label class="description"><?=$user['last_name']?>
					<?=$user['first_name']?>
					<?=$user['patronymic']?></label>
					<?php $basket_posts = get_basket_user($user['id']); ?>
					<?php if (empty($basket_posts)): ?>
						<p>Заказов нет.</p>
					<?php else: ?>
						<table >
							<?php foreach ($basket_posts as $basket_post): ?>	
						<?php if ($basket_post['количество товара']!=0): ?>
							<?php 
					    		$post = get_post_by_id($basket_post['id_товара']);
					    		$category = get_category_name($post['category_id']);
							?>							
								<tr>
				   					<td>				  
				        				<a href="/post.php?post_id=<?=$post['id']?>"><?=$post['Наименование'] ?> (Кол-во: <?= $basket_post['количество товара']?>; Цена всего: <?= $post['Цена']*$basket_post['количество товара'] ?>)</a>
																			
						<?php endif ?>
						<?php endforeach ?>
					<?php endif ?>
				</table>
					<br><br>
				</li>
				<?php endforeach ?>
			</ul>
		</section>
	</main>		
</body>
</html>