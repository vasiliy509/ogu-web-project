<?php 
	require_once "../include/db.php";
	require_once "../include/function.php";
	if (isset($_POST['category_name'])) {
		$category_name = filter_var(trim($_POST['category_name']), FILTER_SANITIZE_STRING);
		$category = set_category($category_name);
	}

	if (isset($_POST['brand'])) {
		$brand = filter_var(trim($_POST['brand']), FILTER_SANITIZE_STRING);
		$brand = del_brand($brand);
	}

	if (isset($_POST['country'])) {
		$country = filter_var(trim($_POST['country']), FILTER_SANITIZE_STRING);
		$country = del_country($country);
	}
	header("Location: ".$_SERVER['HTTP_REFERER']);	# перенаправление на предыдущую страницу
	exit();
 ?>