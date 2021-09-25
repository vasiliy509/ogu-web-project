<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Ошибка авторизации</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">    
</head>
<body>
    <header class="container">
        <?php include "header.php" ?>
    </header>
            
    <main class="container">
        <nav class="item">  
        <?php include "leftblock.php" ?>
        </nav>
        <section class="item">
        <h2>Ошибка авторизации</h2>
        <?php $auth_session['is_authorized'] = false;
        print_r("<p>Такой пользователь не найден!</p>");
        exit("<a href="authorization.php">Авторизоваться</a>");
        ?>
    </section>
    </main> 
    
</body>
</html>