<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\widgets\ActiveForm;
    use app\models\Products;

    $form = ActiveForm::begin();
?>

<?=$form->field($model,"motherboard")->checkbox([])?>
<?=$form->field($model,"proccesor")->checkbox([])?>
<?=$form->field($model,"videocard")->checkbox([])?>

<?php
echo Html::submitButton("Search",[
    "class"=>"btn btn-success" ,
    ""
]);
ActiveForm::end();
?>
    <?php
    if($model->videocard)
    
        echo 'videocards'. "<br>";
    
    if($model->motherboard)
    
        var_dump($product). "<br>";
    
    if($model->proccesor)
    
        echo '1'. "<br>";
    
?>

