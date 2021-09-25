<?php
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	define("DB_HOST", "localhost");
	define("DB_USER", "root");
	define("DB_PASSWORD", "root" );
	define("DB_NAME", "shop");

	$link = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (mysqli_connect_errno()) 
	{
		echo 'Ошибка подключения к БД ('.mysqli_connect_errno().'): '.mysqli_connect_eror();
		exit();
	}
	$auth_session['last_name'] = 'Викулов';
	$auth_session['is_authorized'] = trye;
	
?>