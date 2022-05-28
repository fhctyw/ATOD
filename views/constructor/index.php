<?php /* foreach ($build->parts as $part): */

use app\models\Builds;
use app\models\Products;
use yii\helpers\Url;

?>

<p><?="Назва збірки: ".$build->build_name ?></p>
<p><?="Ціна збірки: ".$build->price().' грн'  ?></p>


<!-- <div class="row">
    <div class="col-3 border border-dark">
        <?php foreach ($products as $product) : ?>
            <img class="img-fluid" src=<?= $product->url_photo ?> 
            data-product_id=<?= $product->product_id ?>
            data-url_photo=<?=$product->url_photo?>
            data-price=<?= $product->price?>
            data-url_site=<?=$product->url_site?>
            data-product_name=<?=$product->product_name?>></img>
        <?php endforeach; ?>
    </div>
    <div class="col-9" id="desk">
        
    </div>
</div> -->