<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\assets\JsAsset;
use app\widgets\Alert;
use yii\helpers\Url;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
//use yii\bootstrap4\Modal;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" >

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/bd99522e1f.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/70fe4785f4.js" crossorigin="anonymous"></script>

    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode("Atod") ?></title>

    <?php $this->head() ?>
</head>

<body class="d-flex flex-column">
    <?php $this->beginBody() ?>

    <header class="header">
        <ul class="menu_items">
            <li class="logo">
                <a href=<?= Url::to(['/home/index']) ?>>ATOD</a>
            </li>
            <li>
                <ul class="menu_items aside">
                    <?php if (Yii::$app->user->isGuest): ?>
                        <li><a class="link" href="/home/login">Увійти</a></li>
                        <li><a class="link" href="/home/register">Зареєструватись</a></li>
                        <a href="#" onclick="return getBusket()"><i class="fas fa-shopping-basket"></i></a>
                        <a><i class="fa-solid fa-magnifying-glass"></i></a>
                    <?php else: ?>
                        <li><a data-method="post" href=<?= Url::to('logout') ?>>Вийти</a></li>
                        <li><a class="fa-solid fa-screwdriver-wrench" href=<?=Url::to('./constructor/index')?>></a></li>
                        <li><i class="fa-solid"></i>Ви (<?=Yii::$app->user->identity->name ?>)</li>
                        
                    <?php endif; ?>
                </ul>
            </li>

        </ul>
    </header>

    <main role="main" class="container-fluid">
        <?= $content ?>
    </main>

    <?php
    \yii\bootstrap4\Modal::begin([
        'title' => '<h2>Кошик</h2>',
        'id' => 'busket',
        'size' => 'modal-lg',
        'footer' => '<button type="button" class="btn btn-default" 
        data-dismiss="modal">Закрити корзину</button>
            <button type="button" class="btn btn-success">Оформити замовлення</button>
            <button type="button" class="btn btn-danger" onclick="clearBusket()">Очистити корзину</button>',
    ]);
    \yii\bootstrap4\Modal::end();
    ?>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>