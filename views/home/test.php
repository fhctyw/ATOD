<?php

use yii\bootstrap4\Html;
use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin() ?> 
<?= $form->field($model,'videocard')->checkbox([]) ?>
<?= $form->field($model,'motherbroad')->checkbox([]) ?>
<?= $form->field($model,'processor')->checkbox([]) ?>
<?= Html::submitButton('Пошук', ['class' => 'btn btn-primary']) ?> 
<?php ActiveForm::end() ?> 

<h1>
    <?php 

    if ($model->videocard)
        echo '1';
    if ($model->motherbroad)
        echo '2';
    if ($model->processor)
        echo '3';
    ?>
</h1>