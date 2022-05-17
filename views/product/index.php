<h1> DataBse content </h1>
 

<?php if(!$products): ?>
<h2>Товар не найдено</h2>;
<?php else: ?>
    <img class="img-fluid" src=<?= $products->url_photo ?>>
<?php
    var_dump($products->url_photo);
    
    //var_dump($product);
    //echo $product->product_id. '<br>';
    ?>
    <?php endif; ?>

