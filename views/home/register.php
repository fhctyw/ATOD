<?php 
use yii\widgets\ActiveForm;
use yii\bootstrap4\Html;
?>
<h1>Реєстрація </h1>
<?php 
//var_dump($model);
?>
<?php $form = ActiveForm::begin(['class'=>'form-horizontal']) ?>
<?= $form->field($model,'name')->textInput() ?>
<?= $form->field($model,'email')->textInput(['autofocus'=>true]) ?>
<?= $form->field($model,'password')->passwordInput() ?>

<div>
   <button type="submit" class="btn btn-primary">Реєстрація</button>
</div>
<?php ActiveForm::end() ?>