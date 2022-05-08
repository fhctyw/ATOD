<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\helpers\Url;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <script src="https://kit.fontawesome.com/70fe4785f4.js" crossorigin="anonymous"></script>
    <title><?= Html::encode($this->title) ?></title>

    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header class="header">
        <ul class="menu_items">
            <li class="logo">
                <a href="index.php">ATOD</a>
            </li>
            <li>
                <ul class="menu_items aside">
                    <li><a class="link" href="/home/login">Увійти</a></li>
                    <li><a class="link" href="/home/register">Зареєструватись</a></li>
                    <!--<li class="aside_img"><a href="#"><img src="web\images\img\shopping-cart.png" width="40px"/></a></li>-->
                    <a><i class="fas fa-shopping-basket"></i></a>
                    <a><i class="fa-solid fa-magnifying-glass"></i></a>
                </ul>
            </li>
            
        </ul>
</header>
    
    <main role="main" class="flex-shrink-0">
        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
