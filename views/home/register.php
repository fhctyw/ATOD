<?php 
use yii\widgets\ActiveForm;
use yii\bootstrap4\Html;
?>
<h1>Реєстрація </h1> 
<?php  
//var_dump($model); 
?> 
<?php $form = ActiveForm::begin(['class'=>'form-horizontal']) ?> 
<?= $form->field($model,'name')->textInput()->label('Ім`я користувача') ?>  
<?= $form->field($model,'email')->textInput()->label('Пошта') ?>
<?= $form->field($model,'password')->passwordInput()->label('Пароль') ?> 
 
<div> 
   <button type="submit" class="btn btn-primary">Зареєструватися</button> 
</div> 
<?php ActiveForm::end() ?>
