<?php 
	session_start();
	require_once "include/db.php";
	$last_name = filter_var(trim($_POST['last_name']), FILTER_SANITIZE_STRING);
	$first_name = filter_var(trim($_POST['first_name']), FILTER_SANITIZE_STRING);
	$patronymic = filter_var(trim($_POST['patronymic']), FILTER_SANITIZE_STRING);
	$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
	 if (mb_strlen($last_name) < 2 || mb_strlen($last_name) > 250) {
		echo "Недопустимая длина фамилии";
		exit();
	} else if (mb_strlen($first_name) < 2 || mb_strlen($first_name8) > 250) {
		echo "Недопустимая длина имени";
		exit();
	} else if (mb_strlen($patronymic) < 2 || mb_strlen($patronymic) > 50) {
		echo "Недопустимая длина отчества";
		exit();
	} else if (mb_strlen($password) < 6 || mb_strlen($password) > 180) {
		echo "Недопустимая длина пароля (от 6 до 8 символов)";
		exit();
	}
	 
	global $link;
	$password = md5($password."erf2jk58h"); 
	
	$link->query("INSERT INTO `users` (`last_name`, `first_name`, `patronymic`, `password`) VALUES ('$last_name', '$first_name', '$patronymic', '$password')");

	$link->close();
	
	header('Location: index.php');	# перенаправление на главную страницу
	exit();
 ?>
 