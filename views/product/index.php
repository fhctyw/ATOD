<h1> DataBse content </h1>
<?php 
foreach ((array) $products as $products) 
{
    var_dump($products);
    echo $products->product_id. '<br>';
}
?>
