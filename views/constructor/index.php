<?php /* foreach ($build->parts as $part): */

use app\models\Builds;
use app\models\Products;
use yii\helpers\Url;
use yii\widgets\Menu;

?>

<div class="row">
    <div class="col-3">
        <?= Menu::widget([
                'items'=>$menu->items,
            ]) ?>
    </div>
    <div class="col-9">
        
    </div>
</div>

<!-- <div class="row" style="display:flex; flex-direction:row; height:100%">
    <div class="col-2">
        <?php foreach ($products as $product): ?>
            <img class="img-fluid" src=<?= $product->url_photo?>
                data-product_id=<?=$product->product_id?>
                data-product_name=<?=json_encode($product->product_name, JSON_UNESCAPED_UNICODE)?>
                data-url_photo=<?=$product->url_photo?>
                data-price=<?=$product->price?>
                data-url_site=<?=$product->url_site?>>
            </img>
        <?php endforeach; ?>
    
    </div>
    <div class="col-10">
        <div class="col h-100">
            <div class="row-9 border border-dark">
                <div class="container" id="desk">
                    <div class="row"></div>
                </div>
            </div>
            <div class="row-3">
                <button class="btn btn-success btn-lg">Зібрати пк</button>
            </div>
        </div>
    </div>
</div> -->