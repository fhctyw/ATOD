<!DOCTYPE html>
<html>

<head>
    <title>Профіль</title>
   <link rel="stylesheet">
   <?php use yii\widgets\ActiveForm; ?>
</head>

<body>
    <main class="main">
        <div class="wrp">
            <section class="computers">
                <div class="profile">
                    <div>
                    <?=  \yii\helpers\Html::img("@web/uploads/{$user['url_photo']}",['alt'=> "@web/uploads/{$user['name']}",'height'=>150])?>
                    <br>Змінити зображення:</br>
                    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data','class'=>'custom-file']]) ?>
                    

                    <?= $form->field($model, 'imageFile',['options' => ['class' => 'custom-file-label']])->fileInput() ?>
                    
<br>
<br>
                     <button>Submit</button>              
                    <?php ActiveForm::end() ?>
                    </div>
                    <div class="profile_info">
                       <p>Ім'я користувача: <? echo $user->name ?> </p>
                       <? echo date('Y-m-d H:i:s'); ?>
                       <p class="count">Кількість зібраних збірок: <?= ' '.$builds_count ?></p>
                    </div>
                </div>
                <?php foreach($builds as $build):?>
                <div class="small_section">
                    <div class="product_view">
                        <?=  \yii\helpers\Html::img("@web/images/products/{$build['url_photo']}",['height'=>150]) ?>
                    </div>
                    <div class="product_price">
                        <p>Назва збірки: <? echo $build->build_name?></p>
                        <? if($build->is_allowed == 'no'): ?>
                        <span class="unmoderated">Не одобрено модератором</span>
                        <? else:?>
                        <span class="moderated">Одобрено модератором</span>
                        <? endif;?>
                        <div class="price_wrp">
                            Ціна збірки:<br>
                            <? //var_dump($build->parts) ?>
                            <span class="price"><?= $build->price() ?>грн.</span>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
               <!--  <div class="small_section">
                    <div class="product_view">
                        <a href="#"><img src="img/pc.jpg" width="280px"></a>
                    </div>
                    <div class="product_price">
                        <p>Назва збірки</p>
                        <span class="unmoderated">Не одобрено модератором</span>
                        <div class="price_wrp">
                            Ціна збірки:<br>
                            <span class="price">99999 грн.</span>
                        </div>
                    </div>
                </div>

                <div class="small_section">
                    <div class="product_view">
                        <a href="#"><img src="img/pc.jpg" width="280px"></a>
                    </div>
                    <div class="product_price">
                        <p>Назва збірки</p>
                        <span class="unmoderated">Не одобрено модератором</span>
                        <div class="price_wrp">
                            Ціна збірки:<br>
                            <span class="price">99999 грн.</span>
                        </div>
                    </div>
                </div>

                <div class="small_section">
                    <div class="product_view">
                        <a href="#"><img src="img/pc.jpg" width="280px"></a>
                    </div>
                    <div class="product_price">
                        <p>Назва збірки</p>
                        <span class="moderated">Одобрено модератором</span>
                        <div class="price_wrp">
                            Ціна збірки:<br>
                            <span class="price">99999 грн.</span>
                        </div>
                    </div>
                </div> -->
            </section>
        </div>
        </main>
        </body>

 <?php /*
use yii\widgets\LinkPager;


$image = Yii::$app->user->identity;
  echo \yii\helpers\Html::img("@web/uploads/{$image['url_photo']}",['alt'=> "@web/uploads/{$image['name']}",'height'=>500]) . '<br>';
  echo Yii::$app->user->identity->name  . '<br>';
  foreach($builds as $build)
  {
    echo $build->build_id . ' ';
    echo $build->build_name . ' ';
  }
  ?>
 
<? -->

  //LinkPager::widget(['pagination'=>$pages]) 
  */?>
</html>