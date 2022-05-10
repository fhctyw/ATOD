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
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/bd99522e1f.js" crossorigin="anonymous"></script>

    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'Home', 'url' => ['/home/index']],
            ['label' => 'Register', 'url' => ['/home/register']],
            ['label' => 'Busket', 'url' => ['/home/busket']],
            ['label' => 'Search', 'url' => ['/home/search']],
            
            
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/home/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/home/logout'], 'post', ['class' => 'form-inline'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->firstname . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>
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
<?php 
\yii\bootstrap4\Modal::begin([
    'title' => '<h2>Корзина</h2>',
    'id' => 'busket',
    'size'=> 'modal-lg',
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
