<?php 
	require_once "../include/db.php";
	require_once "../include/function.php";

	if (isset($_POST['category_name'])) {
		$category_name = filter_var(trim($_POST['category_name']), FILTER_SANITIZE_STRING);
		$category = set_category($category_name);
	}

	if (isset($_POST['edit_category'])) {
		$edit_category = filter_var(trim($_POST['edit_category']), FILTER_SANITIZE_STRING);
		$id_category = $_POST['id_category'];
		$category = edit_category($edit_category, $id_category);
	}

	if (isset($_POST['brand_name'])) {
		$brand_name = filter_var(trim($_POST['brand_name']), FILTER_SANITIZE_STRING);
		$brand = set_brand($brand_name);
		
	}

	if (isset($_POST['edit_brand'])) {
		$edit_name = filter_var(trim($_POST['edit_brand']), FILTER_SANITIZE_STRING);
		$id_brand = $_POST['id_brand'];
		$brand = edit_brand($edit_name, $id_brand);
		header('Location: ../brand.php');	# перенаправление на главную страницу
		$link->close();
		exit();
	}

	if (isset($_POST['country_name'])) {
		$country_name = filter_var(trim($_POST['country_name']), FILTER_SANITIZE_STRING);
		$country = set_country($country_name);
	}

	if (isset($_POST['edit_country'])) {
		$edit_name = filter_var(trim($_POST['edit_country']), FILTER_SANITIZE_STRING);
		$id_country = $_POST['id_country'];
		$country = edit_country($edit_name, $id_country);
		header('Location: ../country.php');	# перенаправление на главную страницу
		$link->close();
		exit();
	}
	header("Location: ".$_SERVER['HTTP_REFERER']);	# перенаправление на предыдущую страницу
	$link->close();
	exit();
 ?>
 