<?php

	try{
		$pdo = new PDO('mysql:host=localhost; dbname=shop', 'root', 'root');
	}
	catch (PDOException $e) {
		echo "Невозможно установить соединение с базой данных";
	}
?>