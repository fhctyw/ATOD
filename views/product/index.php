<?php

use app\models\Characteristics;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

    echo $product->product_name;
    
?>

<div class="photo">
    <section class="product">
        <?php
            echo Html::img(Url::to($product->url_photo));
        ?>
</div>

<div class="price">
    <section class="price">
        <?php
            echo Html::tag($product->price. ' грн')
        ?>
</div>

<div class="characteristic">
    <section class="characteristic">
        <?php
        foreach($characteristics as $characteristic)
        {
            echo $characteristic->name_char;
            echo $characteristic->value_char;
        }
        ?>
</div>
<!--<div class="buttons">
    <button class="btn btn-success btn-lg m-4" target="_blank" rel="noopener noreferrer" href=<?= $products->url_site ?>>Купити</button>
    <button class="btn btn-primary btn-lg add-to-busket m-4" type="button" href=<?= Url::to(['busket/add', 'id' => $products->product_id]) ?> data-id=<?= $products->product_id ?>>Добавити в кошик</button>
</div>
