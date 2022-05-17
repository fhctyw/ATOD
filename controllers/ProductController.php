<?php

namespace app\controllers;

use Yii;
use app\models\Products;
use \yii\base\Controller;

class ProductController extends Controller {
    public function actionIndex() 
    {   
        $id = Yii::$app->request->get('id');
        $products = Products::findByProductId($id);
        return $this->render('index',compact('products'));
    }
}

?>