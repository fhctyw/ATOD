<?php 
use yii\widgets\LinkPager;



$image = Yii::$app->user->identity;
  //echo \yii\helpers\Html::img("@web/uploads/{$image['url_photo']}",['alt'=> "@web/uploads/{$image['name']}",'height'=>500]);
var_dump($builds_part);
  echo $user->name.  '<br>';
  foreach($builds as $build)
  {
    echo $build->build_id . ' ';
    echo $build->build_name . ' ';
    foreach($builds_part as $build_part)
    {
      echo $build_part->product_id . '<br>';
  
    }
  }
  ?>
 
</pre>
<?
//var_dump($builds);
var_dump($products);

  //LinkPager::widget(['pagination'=>$pages]) -->