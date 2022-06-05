<?php

use app\models\Builds;
use app\models\Products;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\widgets\Menu;

$this->registerJsFile('js/Constructor.js', [View::POS_BEGIN, 'depends' => \yii\web\JqueryAsset::class]);

?>

<div class="row">
    <div class="col-3 vh-100" style="overflow: auto;">
        <?= Menu::widget([
            'items' => $menu->items,
            'labelTemplate' => '<i class="category">{label}</i>',
            'options' => ['class' => "border border-dark"]
        ]) ?>
    </div>
    <div class="col-9">
        <div class="col">
            <div class="row-9 vh-100 border border-dark" style="overflow: auto;">
                <div class="container" id="desk">
                    <div class="row"></div>
                </div>
            </div>
            <div class="row-3">
                <div class="build-form">
                    <?php $form = ActiveForm::begin(
                        ['options'=>['class'=>'form-build']])
                         ?> 
                    <?= $form->field($builds, 'build_name')->textInput()->label('Введіть назву збірки') ?>
                    <button class="btn btn-success btn-lg">Зібрати пк</button> 
                    <?php ActiveForm::end() ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>