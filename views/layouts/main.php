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
    <title><?= Html::encode($this->title) ?></title>
    <?php include('C:\OpenServer\domains\ATOD\views\home\header.php')?>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
<div class="inner_header">
        <div class="logo_container">
            <a href="/home/index"><button style="background-color: deepskyblue; border-radius: 10px; border-color: #1E79D7; height: 50px;">
            <h1>A      T      O      D</h1></button></a>
        </div>
        <ul class="navigation">
            <a href="/home/login"><button style="background-color: deepskyblue; border-radius: 10px; border-color: #1E79D7; height: 50px;">
            <li>Увійти</button></li></a>
            <a href="/home/register"><button style="background-color: deepskyblue; border-radius: 10px; border-color: #1E79D7; height: 50px;">
            <li>Зареєструватися</button></li></a>
            <a><i class="fas fa-shopping-basket"></i></a>
            <a><i class="fa-solid fa-magnifying-glass"></i></a>
        </ul>
    </div>
    </div>
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
