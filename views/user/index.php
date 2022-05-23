<?php
?>
<h1> DataBse content </h1>
<?php 
use yii\helpers\Html;
use yii\helpers\Url;

    echo $user->user_id;
?>

<a href=<?= Url::to(['user/index', 'id' => $user->user_id])?> ></a>