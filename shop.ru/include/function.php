<?php
	// запрос всех покупателей
	function get_users()
	{
		global $link;
		$sql = "SELECT * FROM `users` WHERE role=0";
		$result = mysqli_query($link, $sql);
		$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
		return $users;
	}

	// запрос всех категорий товара
	function get_categories()
	{
		global $link;
		$sql = "SELECT * FROM `группа инструмента`";
		$result = mysqli_query($link, $sql);
		$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
		return $categories;
	}
	
	// запрос всех производителей
	function get_brands()
	{
		global $link;
		$sql = "SELECT * FROM `производитель`";
		$result = mysqli_query($link, $sql);
		$brands = mysqli_fetch_all($result, MYSQLI_ASSOC);
		return $brands;
	}
	
	// запрос всех стран производства
	function get_countries()
	{
		global $link;
		$sql = "SELECT * FROM `страна производства`";
		$result = mysqli_query($link, $sql);
		$countries = mysqli_fetch_all($result, MYSQLI_ASSOC);
		#var_dump($countries);
		return $countries;
	}
	
	// запрос последних 5 товаров для гравной страницы
	function get_posts()
	{
		global $link;
		$sql = "SELECT * FROM `товар` WHERE `В наличии`>0 ORDER BY id  DESC LIMIT 5";
		$result = mysqli_query($link, $sql);
		$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
		return $posts;
	}

	// запрос конкретного товара по id
	function get_post_by_id($post_id)
	{
		global $link;
		$post_id = mysqli_real_escape_string($link, $post_id);
		$sql = "SELECT * FROM товар WHERE id =".$post_id;
		$result = mysqli_query($link, $sql);		
		$post = mysqli_fetch_assoc($result) ;
		return $post;
	}

	// запрос товаров в категории по id категории
	function get_posts_by_category_id($category_id)
	{
		global $link;
		$category_id = mysqli_real_escape_string($link, $category_id);
		$sql = "SELECT * FROM товар WHERE `В наличии`>0 AND category_id=".$category_id;
		$result = mysqli_query($link, $sql);		
		$posts = mysqli_fetch_all($result, MYSQLI_ASSOC) ;
		return $posts;
	}

	// запрос страны производства по id
	function get_country_name($country_id) {
		global $link;
		$country_id = mysqli_real_escape_string($link, $country_id);
		$sql = "SELECT Наименование FROM `страна производства` WHERE id=" .$country_id;
		$result = mysqli_query($link, $sql);
		$country = mysqli_fetch_assoc($result);;
		return $country ;
	}

	// запрос производителя по id
	function get_brand_name($brand_id) {
		global $link;
		$brand_id = mysqli_real_escape_string($link, $brand_id);
		$sql = "SELECT Наименование FROM производитель WHERE id =" .$brand_id;
		$result = mysqli_query($link, $sql);
		$brand = mysqli_fetch_assoc($result);
		return $brand;
	}

	// запрос наименования категории товара по id категории
	function get_category_name($category_id) {
		global $link;
		$category_id = mysqli_real_escape_string($link, $category_id);
		$sql = "SELECT title FROM `группа инструмента` WHERE `id`=" .$category_id;
		$result = mysqli_query($link, $sql);
		$category = mysqli_fetch_assoc($result);
		return $category;
	}

	// запрос id пользователя по фамилии
	function get_user_last_name($user_last_name)	{
		global $link;
		$sql = "SELECT `id` FROM `users` WHERE `last_name`='$user_last_name'";
		$result = mysqli_query($link, $sql);
		$user = mysqli_fetch_assoc($result);
		return $user;
	}

	// запрос данных пользователя по id
	function get_user($user_id)	{
		global $link;
		$sql = "SELECT * FROM `users` WHERE id=".$user_id;
		$result = mysqli_query($link, $sql);
		$user = mysqli_fetch_assoc($result);
		return $user;
	}

	// запрос роли пользователя по id
	function get_user_role($user_id) {
		global $link;
		$sql = "SELECT `role` FROM `users` WHERE id=".$user_id;
		$result = mysqli_query($link, $sql);
		$role = mysqli_fetch_assoc($result);
		return $role;
	}

	// запрос содержимого корзины покупателя
	function get_basket_user($user_id) {
		global $link;
		$sql = "SELECT * FROM `корзина` WHERE `user_id`=".$user_id;
		$result = mysqli_query($link, $sql);
		$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
		return $posts;
	}

	// добавление категории товара
	function set_category($category_set) {
		global $link;
		$category_set = mysqli_real_escape_string($link, $category_set);
		$sql = "INSERT INTO `группа инструмента` (`title`) VALUES ('$category_set')";
		$result = mysqli_query($link, $sql);
	}

	// добавление производителя товара
	function set_brand($brand_set) {
		global $link;
		$brand_set = mysqli_real_escape_string($link, $brand_set);
		$sql = "INSERT INTO `производитель` (`наименование`) VALUES ('$brand_set')";
		$result = mysqli_query($link, $sql);
	}

	// добавление страны производства
	function set_country($country_set) {
		global $link;
		#$country_set = mysqli_real_escape_string($link, $country_set);
		$sql = "INSERT INTO `страна производства` (`наименование`) VALUES ('$country_set')";
		$result = mysqli_query($link, $sql);
	}

	// добавление товара
	function set_post($title,$description,$image,$available,$price,$brand,$country,$category) {
		global $link;
		$sql = "INSERT INTO `товар`(`Наименование`, `Описание`, `Картинка`, `В наличии`, `Цена`, `Код производителя`, `Код страны`, `category_id`) VALUES ('$title','$description','$image','$available','$price','$brand','$country','$category')";
		$result = mysqli_query($link, $sql);
	}

	// добавление товара в корзину
	function set_basket($user_id, $id_post) {
		global $link;
		$sql = "INSERT INTO `корзина`(`user_id`, `id_товара`, `количество товара`) VALUES ('$user_id','$id_post', '1')";
		mysqli_query($link, $sql);
	}


	// редактирование категории товара
	function edit_category($category_name, $id_category) {
		global $link;
		$category_name = mysqli_real_escape_string($link, $category_name);
		$sql = "UPDATE `группа инструмента` SET `title`='$category_name' WHERE id='$id_category'";
		$result = mysqli_query($link, $sql);
	}

	// редактирование производителя товара
	function edit_brand($brand_name, $id_brand) {
		global $link;
		$brand_name = mysqli_real_escape_string($link, $brand_name);
		$sql = "UPDATE `производитель` SET `Наименование`='$brand_name' WHERE id='$id_brand'";
		$result = mysqli_query($link, $sql);
	}

	// редактирование страны производства
	function edit_country($country_name, $id_country) {
		global $link;
		$country_name = mysqli_real_escape_string($link, $country_name);
		$sql = "UPDATE `страна производства` SET `Наименование`='$country_name' WHERE id='$id_country'";
		$result = mysqli_query($link, $sql);
	}

	// редактирование товара
	function edit_post($title,$description,$image,$available,$price,$brand,$country,$category) {
		global $link;
		$sql = "INSERT INTO `товар`(`Наименование`, `Описание`, `Картинка`, `В наличии`, `Цена`, `Код производителя`, `Код страны`, `category_id`) VALUES ('$title','$description','$image','$available','$price','$brand','$country','$category')";
		$result = mysqli_query($link, $sql);
	}
	// удаление категории товара
	function del_category($id) {
		global $link;
		$id = mysqli_real_escape_string($link, $id);
		$sql = "DELETE FROM `группа инструмента` WHERE id='$id'";
		$result = mysqli_query($link, $sql);
		return $result;
	}

	// удаление товара по id
	function del_post($post_id) {
		global $link;
		$post_id = mysqli_real_escape_string($link, $post_id);
		$sql = "DELETE FROM `товар` WHERE id='$post_id'";
		$result = mysqli_query($link, $sql);
		return $result;
	}

	// удаление производителя товара
	function del_brand($brand) {
		global $link;
		$brand = mysqli_real_escape_string($link, $brand);
		$sql = "DELETE FROM `производитель` WHERE Наименование='$brand'";
		$result = mysqli_query($link, $sql);
		return $result;
	}

	// удаление страны производителя
	function del_country($country) {
		global $link;
		$country = mysqli_real_escape_string($link, $country);
		$sql = "DELETE FROM `страна производства` WHERE Наименование='$country'";
		$result = mysqli_query($link, $sql);
		return $result;
	}

	// удаление товара из корзины
	function del_basket_post($user_id, $id_post) {
		global $link;
		$sql = "DELETE FROM `корзина` WHERE `корзина`.`id_товара`='$id_post' and `user_id`='$user_id'";
		$result = mysqli_query($link, $sql);
	}

	// увеличение на единицу количества товара в корзине
	function set_basket_plus($user_id, $id_post) {
		global $link;
		$sql = "UPDATE`корзина` SET `количество товара`=`количество товара`+1 WHERE `id_товара`='$id_post' and `user_id`='$user_id'";
		$result = mysqli_query($link, $sql);
	}

	// уменьшение на единицу количества товара в корзине
	function set_basket_minus($user_id, $id_post) {
		global $link;
		$sql = "UPDATE`корзина` SET `количество товара`=`количество товара`-1 WHERE `id_товара`='$id_post' and `user_id`='$user_id'";
		$result = mysqli_query($link, $sql);
	}

	// проверка корзины на наличие товара по id товара и id покупателя
	function get_basket($post_id, $user_id)	{
		global $link;
		$sql = "SELECT `количество товара` FROM `корзина` WHERE `id_товара`='$post_id' and `user_id`='$user_id'";
		$result = mysqli_query($link, $sql);
		$post = mysqli_fetch_assoc($result);
		return $post;
	}

	// проверка корзины на наличие товара по id товара
	function get_basket_post($post_id)	{
		global $link;
		$sql = "SELECT `количество товара` FROM `корзина` WHERE `id_товара`='$post_id'";
		$result = mysqli_query($link, $sql);
		$post = mysqli_fetch_assoc($result);
		return $post;
	}

?>