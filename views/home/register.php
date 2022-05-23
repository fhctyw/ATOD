<?php 

//var_dump($model); 

use yii\widgets\ActiveForm;
use yii\bootstrap4\Html;

?> 

<div class="w-25 mx-auto border p-3 rounded text-white">
   <h1 class="text-primary">Реєстрація </h1>
     
   <?php $form = ActiveForm::begin(['class'=>'form-horizontal']) ?> 

     <?= $form->field($model,'name')->textInput()->label('Ім`я користувача') ?>  
     <?= $form->field($model,'email')->textInput()->label('Пошта') ?>
     <?= $form->field($model,'password')->passwordInput()->label('Пароль') ?> 

     <div> 
       <button type="submit" class="btn btn-primary">Зареєструватися</button> 
     </div> 
    
     <p class="mt-3 text-muted">Вже є профіль? <a href=<?= yii\helpers\Url::to(['/home/login']) ?>> Увійти </a></p>
 
   <?php ActiveForm::end() ?>
</div>