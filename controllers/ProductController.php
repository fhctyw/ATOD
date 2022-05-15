<?php

namespace app\controllers;

use app\models\Products;
use \yii\base\Controller;

class ProductController extends Controller {
    public function actionIndex() 
    {   
        $products = Products::findByProductId('7');
        //var_dump($products);
        //die;
        return $this->render('index',compact('products'));
    }
}

?>