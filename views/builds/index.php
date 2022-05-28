<?php

use app\models\Characteristics;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

    echo $build->build_name;
    
?>

<div class="photo">
    <section class="build">
        <?php
            echo \yii\helpers\Html::img("@web/images/products/{$build['url_photo']}")
        ?>
</div>

<div class="price">
    <section class="price">
        <?php
            echo Html::tag($build->price. ' грн')
        ?>
</div>
