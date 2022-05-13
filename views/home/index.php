<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="silder">
    <section class="product">
        <h2 class="product-category">Найкращі збірки</h2>
        <button class="pre-btn"><?= Html::img(Url::to('@web/images/slider_images/arrow.png')) ?></button>
        <button class="nxt-btn"><?= Html::img(Url::to('@web/images/slider_images/arrow.png')) ?></button>
        <div class="product-container">

            <?php
                for($i = 1; $i < 11; $i++)
                {
                    echo '<div class="product-card">';
                        echo Html::beginTag('div', ['class'=>'product-image']);
                            echo Html::img(Url::to($best_builds[$i]->url_photo), ['class'=>'product-thumb']);
                            echo Html::button('Додати у кошик', ['class'=>'card-btn']);
                        echo Html::endTag('div');
                        
                        echo Html::beginTag('div', ['class'=>'product-info']);
                            echo Html::tag('h2', strlen($best_builds[$i]->product_name) > 20 ? mb_substr($best_builds[$i]->product_name, 0, 20).'...' : $best_builds[$i]->product_name, ['class'=>'product-brand']);
                            echo Html::tag('span', $best_builds[$i]->price.' грн', ['class'=>'price']);
                        echo Html::endTag('div');
                    echo '</div>';
                }
            ?>

            <!-- <div class="product-card">
                <div class="product-image">
                    <img src="images/1.jpeg" class="product-thumb" alt="">
                    <button class="card-btn">Додати у кошик</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">Epic Nuker v1.5</h2>
                    <p class="product-short-description">Ігровий комп’ютер</p>
                    <span class="price">37 134 грн</span>
                </div> 
            </div> -->


           <!--  <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag_k">Вибір користувачів</span>
                    <img src="images/2.jpeg" class="product-thumb" alt="">
                    <button class="card-btn">Додати у кошик</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">Epic Nuker v1.0</h2>
                    <p class="product-short-description">Ігровий комп’ютер</p>
                    <span class="price">29 249 грн</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag_p">Хіт продажу</span>
                    <img src="images/3.jpeg" class="product-thumb" alt="">
                    <button class="card-btn">Додати у кошик</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">Speedster v1.2</h2>
                    <p class="product-short-description">Ігровий комп’ютер</p>
                    <span class="price">18 218 грн</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag_p">Хіт продажу</span>
                    <img src="images/4.png" class="product-thumb" alt="">
                    <button class="card-btn">Додати у кошик</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">VERSUM Galaxy I v2.3</h2>
                    <p class="product-short-description">Ігровий комп’ютер</p>
                    <span class="price">25 806 грн</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag_r">Рекомендуємо</span>
                    <img src="images/5.jpeg" class="product-thumb" alt="">
                    <button class="card-btn">Додати у кошик</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">VERSUM Lich v1.1</h2>
                    <p class="product-short-description">Ігровий комп’ютер</p>
                    <span class="price">23 670 грн</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag_k">Вибір користувачів</span>
                    <img src="images/6.jpeg" class="product-thumb" alt="">
                    <button class="card-btn">Додати у кошик</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">VERSUM Epic Nuker v1.3</h2>
                    <p class="product-short-description">Ігровий комп’ютер</p>
                    <span class="price">34 923 грн</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag_n">Новинка</span>
                    <img src="images/7.jpeg" class="product-thumb" alt="">
                    <button class="card-btn">Додати у кошик</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">King Lich v5.0</h2>
                    <p class="product-short-description">Ігровий комп’ютер</p>
                    <span class="price">87 397 грн</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag_n">Новинка</span>
                    <img src="images/8.jpeg" class="product-thumb" alt="">
                    <button class="card-btn">Додати у кошик</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">Paladin v5.1</h2>
                    <p class="product-short-description">Ігровий комп’ютер</p>
                    <span class="price">75 992 грн</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <img src="images/9.jpeg" class="product-thumb" alt="">
                    <button class="card-btn">Додати у кошик</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">Speedster GTS v1.2</h2>
                    <p class="product-short-description">Ігровий комп’ютер</p>
                    <span class="price">33 251 грн</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <img src="images/10.jpeg" class="product-thumb" alt="">
                    <button class="card-btn">Додати у кошик</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">Gigabyte Windforce v3.0</h2>
                    <p class="product-short-description">Ігровий комп’ютер</p>
                    <span class="price">32 651 грн</span>
                </div>
            </div>
        </div> -->
    </section>

</div>

<div class="content">
</div>

