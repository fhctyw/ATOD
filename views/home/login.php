<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Увійти'; 
?>

<div class="login w-25 mx-auto border p-3 rounded"> 
    <h1><?= Html::encode($this->title) ?></h1> 
 
    <?php $form = ActiveForm::begin([ 
        'id' => 'login-form', 
        'layout' => 'horizontal', 
        'fieldConfig' => [ 
            'template' => "{label}\n{input}\n{error}", 
            'labelOptions' => ['class' => 'col-lg-12 col-form-label mr-lg-3'], 
            'inputOptions' => ['class' => 'col-lg-12 form-control'], 
            'errorOptions' => ['class' => 'col-lg-12 invalid-feedback'], 
        ], 
    ]); ?> 
 
        <div class="form">
            <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Ім`я користувача') ?> 

             <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?> 

            
             <?= $form->field($model, 'rememberMe')->checkbox([ 
               'template' => "<div class=\"offset-lg col-lg-8 text-primary custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>", 
            ])->label('Запам`ятати мене') ?> 
        </div>
 
        <div class="form-group"> 
            <div class="offset-lg col-lg-12"> 
                <?= Html::submitButton('Увійти', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?> 
            </div> 
        </div> 

        <p class="mt-3 text-muted col-lg-12 text-center">Немає профілю? <a href=<?= yii\helpers\Url::to(['/home/register']) ?>> Реєстрація </a></p>
 
    <?php ActiveForm::end(); ?> 
</div>