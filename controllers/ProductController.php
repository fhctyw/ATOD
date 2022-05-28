<?php

namespace app\controllers;

use Yii;
use app\models\Products;
use \yii\base\Controller;
use app\models\Characteristics;

class ProductController extends Controller {
    public function actionIndex() 
    {   
        $id = Yii::$app->request->get('id');
        $product = Products::findByProductId($id);
        $characteristics = Characteristics::find()->where(['product_id' => $id])->all();
        return $this->render('index',compact('product', 'characteristics'));
    }
}

?>