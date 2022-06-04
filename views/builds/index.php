<?php

use app\models\Characteristics;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
    
?>

    <div class="build_name">
            <?echo $build->build_name;?>
    </div>
        <div class="row">
            <div class="col-5">
                <div class="photo">
                        <?php
                            echo \yii\helpers\Html::img("@web/images/products/{$build['url_photo']}", ['height'=>400])
                        ?>
                </div>
                    <div class="buttons">
                         <button class="btn btn-success btn-lg m-4" target="_blank" rel="noopener noreferrer" href=<?= $products->url_site ?>>Купити</button>
                        <button class="btn btn-primary btn-lg add-to-busket m-4" type="button" href=<?= Url::to(['busket/add', 'id' => $products->product_id]) ?> data-id=<?= $products->product_id ?>>Добавити в кошик</button>
                    </div>
            </div>
            <div class="col-7">
                <div class ="scroll-div">
                        <?php
                            foreach($characteristics as $characteristic)
                            { 
                                echo $characteristic->name_char;
                                echo $characteristic->value_char. '<br>';
                            }
                        ?>
                <div class="price">
                    <?= $build->price(). ' грн'?>
                </div>
                </div>
            </div>