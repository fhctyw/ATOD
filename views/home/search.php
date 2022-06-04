<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\widgets\ActiveForm;
    use app\models\Products;
    use yii\widgets\LinkPager;
    use yii\widgets\Pagination;

    $form = ActiveForm::begin();
    
?>


<?=
$form->field($model, "categories")->checkboxList([
    "videocards"=>"Відеокарти",
    "processors"=>"Процессори",
    "motherboards"=>"Материнська плата",
    "memory"=>"Оперативна пам'ять",
    "hdd"=>"Твердотілий накопичувач",
    "ssd"=>"ССД",
    "psu"=>"Блок живлення",
    "cases"=>"Корпус",
    "coolers"=> "Охолодження",
    "tv_tuners"=>"Карта захоплення",
    "keybords-mice"=>"Периферія",
    "optical-drives"=>"Оптичні приводи",
])
?> 


<?php
echo Html::submitButton("Search",[
    "class"=>"btn btn-success" ,
    ""
]);
ActiveForm::end();
foreach ($products as $product): ?>
<?= "<p>". $product->product_name . "</p>";
    echo "<p>". $product->price . "грн" ."</p>";
    echo Html::img(Url::to($product->url_photo)) ."</p>";
?>
<a class="btn btn-success btn-lg m-4" target="_blank" rel="noopener noreferrer" href=<?= $product->url_site ?>>Купити</a>
<button class="btn btn-primary btn-lg add-to-busket m-4" type="button" href=<?= Url::to(['busket/add', 'id' => $product->product_id]) ?> data-id=<?= $product->product_id ?>>Добавити в кошик</button>
<?php endforeach; ?>
<?= LinkPager::widget(['pagination'=>$pages]) ?>

