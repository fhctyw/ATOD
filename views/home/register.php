<?php 

//var_dump($model); 

use yii\widgets\ActiveForm;
use yii\bootstrap4\Html;

$this->registerCssFile('css/login.register.css', ['depends' => \yii\bootstrap4\BootstrapAsset::class]);

?> 

<div class="register w-25 mx-auto border p-3 rounded ">
   <h1> Реєстрація </h1>
     
   <?php $form = ActiveForm::begin([
       'class'=>'form-horizontal'
    ]) ?> 

     <div class="form-reg">
        <?= $form->field($model,'name')->textInput()->label('Ім`я користувача') ?>  
         <?= $form->field($model,'email')->textInput()->label('Пошта') ?>
        <?= $form->field($model,'password')->passwordInput()->label('Пароль') ?> 
     </div>

     <div class="button"> 
        <button type="submit" class="btn btn-primary btn-block col-lg-13">Зареєструватися</button> 
     </div> 
    
     <p class="mt-3 text-muted col-lg-12 text-center">Вже є профіль? <a href=<?= yii\helpers\Url::to(['/home/login']) ?>> Увійти </a></p>
 
   <?php ActiveForm::end() ?>
</div>