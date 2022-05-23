<?php

use app\models\Characteristics;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

    echo $products->product_name;
    
?>

<div class="photo">
    <section class="product">
        <?php
            echo Html::img(Url::to($products->url_photo));
        ?>
</div>

<div class="cost">
    <section class="cost">
        <?php
            echo Html::tag($products->price. ' грн')
        ?>
</div>

<div class="characteristic">
    <section class="characteristic">
        <?php
        foreach($characteristics as $characteristic)
        {
            echo $characteristic->value_char;
        }
        ?>
</div>
<!--<div class="buttons">
    <button class="btn btn-success btn-lg m-4" href=<?= Url::to(['product/index', 'id' => $product->product_id])  ?> >Купити</button>
    <button class="btn btn-primary btn-lg add-to-busket m-4" type="button" href=<?= Url::to(['busket/add', 'id' => $product->product_id]) ?> data-id=<?= $product->product_id ?>>Добавити в кошик</button>
</div>