<h1> DataBse content </h1>
<?php 
use yii\helpers\Html;
use yii\helpers\Url;

    echo $products->product_name;
?>

<a class="btn btn-success btn-lg m-4" href=<?= Url::to(['home/product', 'id' => $product->product_id])  ?>>Купити</a>