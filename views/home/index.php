<?php
use yii\widgets\LinkPager;
/** @var yii\web\View $this */

$this->title = 'Atod';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

            <div class="col-lg-4">
            <?php 
                  foreach ((array) $products as $product) {
                      echo $product->product_name . '<br>';
                    } 

                    ?>
                <a href="<?= \yii\helpers\Url::to(['/busket/add', 'id'=>
                $product->product_id])?>" data-id="<?= $product->product_id?>"  class="btn btn-default add-to-busket">У кошик</a>
                    <a class ="btn btn-default add-to-busket "href="/busket/add?id=2">Добавити у кошик</a>
                    
             <?php  //var_dump($products); ?>
            </div>
        </div>

    </div>
</div>
