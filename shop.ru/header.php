<?php
    require_once "include/db.php";
    require_once "include/function.php";
    if($auth_session['is_authorized'] == true){
    $user = get_user_last_name($auth_session['last_name']);
    $user_role = get_user_role($user['id']);
    }
?>
    <div class = "item">
        <a href="index.php"><img class="logo" src="images/logo.png"></a> 
    </div>   
    <nav class = "item"> 
          
        <?php if ($user_role['role'] == 0): ?>
        <ul>
            <!--<li class="button"><a href="index.php">Главная</a></li>-->
            <?php if($auth_session['is_authorized'] == true): ?>  
            <li class="button"><a href="basket.php">Корзина</a></li>
        <?php endif ?>
        </ul> 
        <?php elseif ($user_role['role'] == 1): ?>
        <ul>
            <li class="button"><a href="orders.php">Просмотр заказов</a></li>
            <li class="button"><a href="brand.php">Производители</a></li>
            <li class="button"><a href="country.php">Страны производства</a></li>
        </ul>  
        <?php endif ?>     
    </nav>
    <div class="user"> 
      <?php if($auth_session['is_authorized'] == true): ?>  
      <div>
        <?php 
            if($user_role['role'] == 1) 
                echo "Администратор <br>";               
            else
                echo "Покупатель <br>";
            echo $auth_session['last_name']; ?>
      </div>
      <br>       
        <div>  
            <a href="exit.php" >Выйти</a>
        </div>
    <?php else: ?>
        <div>
            <img src="images/user-profile-icons.png">
            <a href="authorization.php" >Войти</a>
        </div>
        <div>
            <a href="registration.php">Регистрация</a>
        </div>
<?php endif ?>
     </div>

   