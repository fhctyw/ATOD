<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

?>

<html>
<head>
    <meta charset="utf-8" />
    <title>Авторизація</title>
</head>
<body>
    <form class="form" action="../core/login.php" method="POST">
        <h1>Увійти</h1>
        <div class="input-form">
            <input type="text" name="email" placeholder="Пошта користувача">
        </div>
        <div class="input-form">
            <input type="password" name="password" placeholder="Пароль">
        </div>
        <div class="input-form">
            <input type="submit" name="do_login" value="Увійти">
        </div>
        <a href="#" class="forget">Забули пароль?</a>
    </form>

</body>
</html>