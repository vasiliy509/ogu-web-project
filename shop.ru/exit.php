<?php
	session_start();
 
    unset($_SESSION["last_name"]);
    unset($_SESSION["password"]);
     
	header('Location: /index.php');
?>