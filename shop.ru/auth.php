<?php 
	session_start();
	require_once "include/db.php";
	require_once "include/function.php";
	//Объявляем ячейку для добавления ошибок, которые могут возникнуть при обработке формы.
 	$auth_session =& $_SESSION['auth_subsystem'];
	$last_name = filter_var(trim($_POST['last_name']), FILTER_SANITIZE_STRING);
	$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

	global $link;
	$password = md5($password."erf2jk58h"); 
	
	$result = $link->query("SELECT * FROM `users` WHERE `last_name` = '$last_name' AND `password` = '$password'");

	$user = $result->fetch_assoc();
	if (count($user)>0) {
		
		$auth_session['last_name'] = $last_name;
        $auth_session['password'] = $password;
        $auth_session['is_authorized'] = true;
		header('Location: index.php');	# перенаправление на главную страницу
		$link->close();
		exit();
	}
	else {
		$auth_session['is_authorized'] = false;
		header('Location: authorization.php?$auth_session["last_name"]');	# перенаправление на форму авторизации
		
		print_r("<p>Такой пользователь не найден!</p>");
		$link->close();
		exit();
	}
?>