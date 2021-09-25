<?php 
session_start();
require_once "include/db.php";
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
		<?php 
		include "header.php";
		if ($user != NULL){
		$user = get_user_last_name($auth_session['last_name']);
		$user_role = get_user_role($user['id']);
		}
		 ?>
	</header>			
	<main class="container">	
		<nav class="item">	
		<?php include "leftblock.php" ?>
		</nav>
		<section class="item">
			<div class="post">
				<h2>Последние добавленные товары:</h2>	
				<?php if ((int)$user_role['role'] == 1): ?>
				<div>
				<a  href="new_post.php"> Добавить товар</a>
				</div>	
				<?php endif ?>
			</div>
			<?php $posts= get_posts(); ?>
			<?php foreach ($posts as $post): ?>
			<table >
				<tr>
				   	<td colspan="4">
				        <h3 class="item"><a href="/post.php?post_id=<?=$post['id']?>"><?=$post['Наименование'] ?></a></h3>
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
			<?php endforeach; ?>
		</section>
	</main>		
</body>
</html>


