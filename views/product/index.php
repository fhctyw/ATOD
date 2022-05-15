<h1> DataBse content </h1>
<?php 
use yii\helpers\Html;
use yii\helpers\Url;

    echo $products->product_name;
?>

<a href="<?= \yii\helpers\Url::to(['/user/index', 'id' => $product->product_id]) ?>" data-id="<?= $product->product_id ?>"></a>