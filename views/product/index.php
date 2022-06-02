<?php

use app\models\Characteristics;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
    
?>

<div class="card">
    <div class="name">
        <?php
            echo $product->product_name;
        ?>
    </div>
    <div class="row">
        <div class="col-5">
            <img class="photo">
            <section class="product">
                <?php
                echo Html::img(Url::to($product->url_photo),["height"=>450]);
                ?>
            </section>
            </img>
            <div class="buttons ">
                <button class="btn btn-success btn-lg m-4" target="_blank" rel="noopener noreferrer" href=<?= $product->url_site ?>>Купити</button>
                <button class="btn btn-primary btn-lg add-to-busket m-4" type="button" href=<?= Url::to(['busket/add', 'id' => $product->product_id]) ?> data-id=<?= $product->product_id ?>>Додати в кошик</button>
            </div>
        </div>
        <div class="col-7">
        <div class="scroll-div">
            <section class="characteristic">
                <?php
                foreach($characteristics as $characteristic)
                {
                echo $characteristic->name_char. ': ';
                echo $characteristic->value_char. '<br>';
                }
                ?>
            </section>
        </div>
        <div class="cost text-success">
            <section class="cost">
                <?php
                echo ($product->price. ' грн')
                ?>
            </section>
        </div>
        </div>
    </div>
</div>
