<?php 
	require_once "../include/db.php";
	require_once "../include/function.php";

// ищем товар по id в корзине, если такого товара нет, то записываем новую строчку товара
// если такой товар есть, то изменяем количество товара в корзине
	if(isset($_GET['post_id']) and isset($_GET['user_id']))	{
		$id = $_GET['post_id'];
		$user_id = $_GET['user_id'];
		$post = set_basket($user_id, $id);
		header("Location: ".$_SERVER['HTTP_REFERER']);	# перенаправление на предыдущую страницу
		$link->close();
		exit();
	}
	if(isset($_GET['del_id']) and isset($_GET['user_id']))	{
		$id = $_GET['del_id'];
		$user_id = $_GET['user_id'];
		del_basket_post($user_id, $id);
		header("Location: ".$_SERVER['HTTP_REFERER']);	# перенаправление на предыдущую страницу
		$link->close();
		exit();
	}
	$link->close();
	exit();
 ?> 