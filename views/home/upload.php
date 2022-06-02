<?php
use yii\widgets\ActiveForm;
?>
<label for="avatar">Choose a profile picture:</label>
<?php var_dump(Yii::$app->user->identity->id) ?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <button>Submit</button>

<?php ActiveForm::end() ?>
<h2> Done </h2>
<?php

    $image = Yii::$app->user->identity;
  echo \yii\helpers\Html::img("@web/uploads/{$image['url_photo']}",['alt'=> "@web/uploads/{$image['name']}",'height'=>150]);
  echo \yii\helpers\Html::img("@web/uploads/{$image->url_photo}",['height'=>150]);
 /*  echo \yii\helpers\Html::img($image->url_photo);
 var_dump($image->url_photo); */

 ?>