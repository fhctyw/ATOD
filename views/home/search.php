<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\Products;
use yii\widgets\LinkPager;
use yii\widgets\Pagination;

$this->registerCssFile('css/search.css', ['depends' => \yii\bootstrap4\BootstrapAsset::class]);


?>


<div class="row">
    <div class="col-3 p-3">
        <?
        $form = ActiveForm::begin();
        echo $form->field($model, "categories")->checkboxList([
            "videocards" => "Відеокарти",
            "processors" => "Процессори",
            "motherboards" => "Материнська плата",
            "memory" => "Оперативна пам'ять",
            "hdd" => "Твердотілий накопичувач",
            "ssd" => "ССД",
            "psu" => "Блок живлення",
            "cases" => "Корпус",
            "coolers" => "Охолодження",
            "tv_tuners" => "Карта захоплення",
            "keybords-mice" => "Периферія",
            "optical-drives" => "Оптичні приводи",
        ])->label("Пошук за категоріями")
        ?>


        <?php
        echo Html::submitButton("Search", [
            "class" => "btn btn-success",
            ""
        ]);
        ActiveForm::end();
        ?>
    </div>
    <div class="col-9">
        <div class="container-fluid">
            <div class="row item_wrap">
                <?php foreach ($products as $product) : ?>
                    <div class="col-md-5 item-main">
                        <div class="container">
                            <div class="row">
                                <div class="col text-center">
                                    <a href=<?= Url::to(['product/index', 'id' => $product->product_id]) ?>>
                                        <img class="img-fluid" src=<?= $product->url_photo ?> style="width:200px;height:200px;">
                                    </a>
                                    <h4><a class="text item_content" href=<?= Url::to(['product/index', 'id' => $product->product_id]) ?>><?= $product->product_name ?></a></h4>
                                </div>
                                <div class="col d-flex align-items-center text-center">
                                    <div class="col d-flex flex-column align-items-center">
                                        <div class="row">
                                            <h1 class="text m-4 item_title"><?= $product->price . " грн" ?></h1>

                                        </div>
                                        <div class="row">
                                            <a class="btn btn-success btn-lg m-4" target="_blank" rel="noopener noreferrer" data-location="<?= $product->url_site ?>" href=<?= $product->url_site ?>>Купити</a>
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