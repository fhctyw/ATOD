<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Увійти'; 
?>

<div class="w-25 mx-auto border p-3 rounded text-white"> 
    <h1 class="text-primary"><?= Html::encode($this->title) ?></h1> 
 
    <?php $form = ActiveForm::begin([ 
        'id' => 'login-form', 
        'layout' => 'horizontal', 
        'fieldConfig' => [ 
            'template' => "{label}\n{input}\n{error}", 
            'labelOptions' => ['class' => 'col-lg-9 col-form-label mr-lg-3'], 
            'inputOptions' => ['class' => 'col-lg-9 form-control'], 
            'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'], 
        ], 
    ]); ?> 
 
        <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Ім`я користувача') ?> 

        <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?> 
 
        <?= $form->field($model, 'rememberMe')->checkbox([ 
            'template' => "<div class=\"offset-lg-1 col-lg-8 text-primary custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>", 
        ])->label('Запам`ятати мене') ?> 
 
        <div class="form-group"> 
            <div class="offset-lg-1 col-lg-11"> 
                <?= Html::submitButton('Увійти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?> 
            </div> 
        </div> 

        <p class="mt-3 text-muted">Немає профілю? <a href=<?= yii\helpers\Url::to(['/home/register']) ?>> Реєстрація </a></p>
 
    <?php ActiveForm::end(); ?> 
</div>