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
            echo Html::img(Url::to($build->url_photo));
        ?>
</div>

<div class="cost">
    <section class="cost">
        <?php
            echo Html::tag($build->price. ' грн')
        ?>
</div>
