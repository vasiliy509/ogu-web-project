<?php 
	session_start();
	require_once "include/db.php";
	require_once "include/function.php";
	$post_id =$_GET['post_id'];
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
	$user_id = get_user_last_name($auth_session['last_name']);
	$post = get_post_by_id($post_id);
	$basket_post = get_basket($post_id, $user_id['id']);
	$post_basket = get_basket_post($post_id);
	 ?>
	</header>
	<main class="container">
		
		<nav class="item">	
			<?php include "leftblock.php" ?>	
		</nav>
		<section class="item">
			<div class="post">
				<h2><?=$post['Наименование'] ?></h2>			
				<div>
				<?php if ($user_role['role'] == 1): ?>
				<?php if($post_basket==NULL): ?>
					<a  href="/forms/del_post.php?del=<?= $_GET['post_id'] ?>"> Удалить товар</a>
				<?php endif; ?>
			<?php endif; ?>
				</div>
			</div>
			<table>
			    <tr>
			        <td>
			        	<div class="img"><img src="<?=$post['Картинка'] ?>"></div>
			        	<div class="price"><h3>Цена: <?=$post['Цена'] ?> руб.</h3> </div>
			        	<div class="basket">
			        	<?php if($auth_session['is_authorized'] == true and $user_role['role'] == 0): ?>
			        		<h4>В корзине:</h4>
							<?php if($basket_post==NULL): ?>
								<a href="/forms/basket_new_post.php?post_id=<?=$_GET['post_id'] ?>&user_id=<?= $user_id['id'] ?>"><img src="images/плюс.png"></a>
				        	<?php elseif ($basket_post['количество товара']==0): ?>
				        		<?= $basket_post['количество товара'] ?><br>
				        		<a href="/forms/basket_plus.php?post_id=<?= $_GET['post_id'] ?>&user_id=<?= $user_id['id'] ?>"><img src="images/плюс.png"></a>
				        	<?php elseif ($basket_post['количество товара']>1): ?>
				        		<?= $basket_post['количество товара'] ?><br>
				        		<a href="/forms/basket_minus.php?post_id=<?=$_GET['post_id'] ?>&user_id=<?= $user_id['id'] ?>"><img src="images/минус.png"></a>
				        		<a href="/forms/basket_plus.php?post_id=<?=$_GET['post_id']?>&user_id=<?= $user_id['id'] ?>"><img src="images/плюс.png"></a>
				        	<?php else: ?>
				        		<?= $basket_post['количество товара'] ?><br>
				        		<a href="/forms/basket_new_post.php?del_id=<?=$_GET['post_id'] ?>&user_id=<?= $user_id['id'] ?>"><img src="images/минус.png"></a>
				        		<a href="/forms/basket_plus.php?post_id=<?=$_GET['post_id'] ?>&user_id=<?= $user_id['id'] ?>"><img src="images/плюс.png"></a>
				        	<?php endif; ?>
			        	<?php endif; ?>
			        	</div>
			        </td>
			        <td colspan="3">
			        	<p class="item"><?=$post['Описание'] ?></p>
			        </td>
			    </tr>
			    <tr class="detalies">
				<?php 
				    $brand = get_brand_name($post['Код производителя']);
				    $country = get_country_name($post['Код страны']);
				    $category = get_category_name($post['category_id']);
				?>
				   	<td>Страна: <?= $country['Наименование'] ?></td>
				    <td>Бренд: <?= $brand['Наименование'] ?></td>
				    <td>Категория: <?= $category['title'] ?></td>
				    <td>В начилии: <?= $post['В наличии'] ?></td>
				</tr>
			    
			</table>
			
		</section>
	</main>	
</body>
</html>
