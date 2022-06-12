<?php

use app\models\Characteristics;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use app\models\Admins;
use app\models\Builds;
use yii\bootstrap4\ActiveForm;

?>

<div class="build_name">
    <? echo $build->build_name; ?>
</div>
<div class="row">
    <div class="col-5">
        <div class="container_roma">
            <div class="builds_photo">
                <?php
                echo \yii\helpers\Html::img("@web/images/products/{$build['url_photo']}", ['height' => 400])
                ?>
            </div>
        </div>
        <div class="builds_buttons">
            <button class="btn btn-success btn-lg m-4" target="_blank" rel="noopener noreferrer" href=<?= $products->url_site ?>>Купити</button>
            <button class="btn btn-primary btn-lg add-to-busket m-4" type="button" href=<?= Url::to(['busket/add', 'id' => $products->product_id]) ?> data-id=<?= $products->product_id ?>>Добавити в кошик</button>
                <?php if(Admins::isAdmin(Yii::$app->user->identity->id)): ?>
                    <?php $form = ActiveForm::begin();?>    
                    <form><button class="btn btn-info" data-toggle="button"><input type="hidden" name="state" value=<?= Builds::isAllowed($build->build_id) ? "0" : "1"?>></input><?= Builds::isAllowed($build->build_id) ? "Не одобрити" : "Одобрити"?></button></form>
                    <?php ActiveForm::end(); ?>
                <?php endif;?>
        </div>
    </div>
    <div class="col-7">
        <div class="scroll-div-roma">
            <?php
            foreach ($characteristics as $characteristic) {
                echo '<ul>' . $characteristic[0];
                foreach ($characteristic[1] as $char) {
                    echo '<li>' . $char->name_char . '    ' . $char->value_char . '</li>';
                }
                //echo $characteristic->name_char;
                //echo $characteristic->value_char. '<br>';\
                echo '</ul>';
            }
            ?>
            <div class="price">
                <?= $build->price() . ' грн' ?>
            </div>
        </div>
    </div>
</div>