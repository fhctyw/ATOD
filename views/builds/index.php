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
            echo \yii\helpers\Html::img("@web/images/products/{$build['url_photo']}", ['height'=>150])
        ?>
</div>

<div class="price">
    <section class="price">
        <?= $build->price(). ' грн'?>
</div>

<div class="characteristic">
    <section class="characteristic">
        <?php
        foreach($characteristics as $characteristic)
        { 
            echo $characteristic->name_char;
            echo $characteristic->value_char. '<br>';

        }
        ?>
</div>