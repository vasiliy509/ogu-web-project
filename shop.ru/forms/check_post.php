<?php 
	require_once "../include/db.php";
	require_once "../include/function.php";
	$title = filter_var(trim($_POST['title']), FILTER_SANITIZE_STRING);
	$description = filter_var(trim($_POST['description']), FILTER_SANITIZE_STRING);
	$image = filter_var(trim($_POST['image']), FILTER_SANITIZE_STRING);
	$available = filter_var(trim($_POST['available']), FILTER_SANITIZE_STRING);
	$price = filter_var(trim($_POST['price']), FILTER_SANITIZE_STRING);
	$brand = $_POST['brand'];
	$country = $_POST['country'];
	$category = $_POST['category'];
	set_post($title,$description,$image,$available,$price,$brand,$country,$category);
	
	header('Location: ../index.php');	# перенаправление на другую страницу
	$link->close();
	exit();
 ?>