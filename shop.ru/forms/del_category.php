<?php 
	require_once "../include/db.php";
	require_once "../include/function.php";
	
	if(isset($_GET['del']))	{
		$id = $_GET['del'];
		$delete = del_category($id);
		header('Location: ../index.php');	# перенаправление на главную страницу
		$link->close();
		exit();
	}
	$link->close();
	exit();
 ?> 