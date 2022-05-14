<?php 
use yii\widgets\ActiveForm;
use yii\bootstrap4\Html;
?>
<html>
<head>
    <meta charset="utf-8" />
    <title>Реєстрація</title>
</head>
<body>
    <form class="form" action="login.php" method="POST">
        <h1>Реєстрація</h1>
        <p>Створити профіль</p>
        <div class="input-form">
            <input type="text" name="name" placeholder="Ваше ім'я">
        </div>
        <div class="input-form">
            <input type="text" name="email" placeholder="Введіть email">
        </div>
        <div class="input-form">
            <input type="password" name="password" placeholder="Придумайте пароль">
        </div>
        <div class="input-form">
            <input type="submit" name="do_login" value="Зареєструватися">
        </div>
        <div class="ifit">
        <a href="#" class="ifit">Вже є профіль? Увійдіть</a>
        </div>
    </form>

</body>
</html>
