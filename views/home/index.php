<?php

use app\models\Products;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->registerJsFile('js/SLscript.js', ['depends' => \yii\web\JqueryAsset::class]);
$this->registerCssFile('css/slider.css', ['depends' => \yii\bootstrap4\BootstrapAsset::class]);

?>

<div class="slider">
    <section class="product">
        <h2 class="product-category">Збірки від користувачів</h2>
        <button class="pre-btn"><?= Html::img(Url::to('@web/images/slider_images/arrow.png')) ?></button>
        <button class="nxt-btn"><?= Html::img(Url::to('@web/images/slider_images/arrow.png')) ?></button>
        <div class="product-container">

            <?php
            foreach ($best_builds as $build) {
                echo '<div class="product-card">';
                echo Html::beginTag('div', ['class' => 'product-image']);
                echo Html::img(Url::to('/images/products/'.$build->url_photo), ['class' => 'product-thumb','data-location' => Url::to(['builds/index', 'id' => $build->build_id])]);
                echo Html::button('Добавити в кошик', ['class' => 'card-btn add-to-busket','data-id'=> "$build->build_id"]);
                echo Html::endTag('div');

                echo Html::beginTag('div', ['class' => 'product-info']);
                echo Html::tag('h2', strlen($build->build_name) > 20 ? mb_substr($build->build_name, 0, 20) . '...' : $build->build_name, ['class' => 'product-brand']);
                if ($build->is_allowed)
                    echo Html::tag('p', 'Одобрено', ['class'=>'text-success font-weight-bold m-0']);
                else
                    echo Html::tag('p', 'Не одобрено', ['class'=>'text-danger font-weight-bold m-0']);
                echo Html::tag('span', $build->price() . ' грн', ['class' => 'price']);
                echo Html::endTag('div');
                echo '</div>';
            }
            ?>
    </section>
</div>

<div class="container-fluid" style="width: 90%;">
    <div class="row item_wrap">
        <?php foreach($products as $product): ?>
        <div class="col-md-5 item-main"> 
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                            <a href=<?= Url::to(['product/index','id'=>$product->product_id]) ?>>
                        <img class="img-fluid" src=<?= $product->url_photo ?> style = "width:200px;height:200px;">
                        </a>
                        <h4><a class="text item_content" href=<?= Url::to(['product/index', 'id' => $product->product_id]) ?>><?= $product->product_name ?></a></h4>
                    </div>
                    <div class="col d-flex align-items-center text-center">
                        <div class="col d-flex flex-column align-items-center">
                            <div class="row">
                                <h1 class="text m-4 item_title"><?= $product->price . " грн" ?></h1>

                            </div>
                            <div class="row">
                                <a class="btn btn-success btn-lg m-4" target="_blank" rel="noopener noreferrer" data-location = "<?= $product->url_site ?>" href=<?= $product->url_site ?>>Купити</a>
                            </div>
                            <div class="row">
                                <button class="btn btn-primary btn-lg add-to-busket m-4" type="button" href=<?= Url::to(['busket/add', 'id' => $product->product_id]) ?> data-id=<?= $product->product_id ?>>Добавити в кошик</button>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>    
        <?php endforeach; ?>
    </div>
</div>
<?= LinkPager::widget([
        'pagination'=>$pages,
        'options'=>[
            'class'=>'pagination',
        ],
        'linkOptions' => ['class' => 'page-link'],
        'linkContainerOptions' => ['class' => 'page-item'],
        ]) ?>
